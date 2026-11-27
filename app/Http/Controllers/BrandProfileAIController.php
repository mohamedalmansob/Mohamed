<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class BrandProfileAIController extends Controller
{
    /**
     * الحقول المسموح للمساعد باقتراح تعبئتها.
     */
    private const SECTION_FIELDS = [
        'basic_info' => [
            'name',
            'international_name',
            'industry',
            'geo_scope',
            'business_description',
            'products',
            'services',
            'additional_information',
        ],
        'vision_mission_values' => [
            'vision',
            'mission',
            'values',
        ],
        'visual_identity' => [
            'tagline',
            'fonts',
            'primary_color',
            'secondary_color',
            'accent_color',
            'visual_description',
        ],
        'personality' => [
            'personality_description',
            'personality_traits',
            'desired_perception',
        ],
        'communication' => [
            'tone_description',
            'language',
            'dialect',
            'writing_style',
            'preferred_expressions',
            'avoided_expressions',
        ],
        'positioning' => [
            'competitive_advantage',
            'value_proposition',
            'reasons_to_choose',
            'competitor_context',
        ],
        'goals' => [
            'business_goals',
            'marketing_goals',
            'current_priorities',
            'goals_timeframe',
        ],
    ];

    /**
     * تحليل بيانات ملف العلامة التجارية
     * واقتراح تعبئة الحقول الفارغة.
     *
     * لا يتم حفظ البيانات أو الاقتراحات في قاعدة البيانات.
     */
    public function analyze(Request $request)
    {
        /*
         * تحويل الحقول الواردة بصيغة JSON إلى مصفوفة.
         */
        $rawFields = $request->input('fields');

        if (is_string($rawFields)) {
            $decodedFields = json_decode($rawFields, true);

            if (
                json_last_error() !== JSON_ERROR_NONE ||
                !is_array($decodedFields)
            ) {
                throw ValidationException::withMessages([
                    'fields' => 'تعذر قراءة بيانات الأقسام المرسلة.',
                ]);
            }

            $request->merge([
                'fields' => $decodedFields,
            ]);
        }

        /*
         * التحقق من البيانات والملفات.
         */
        $validated = $request->validate([
            'fields' => ['nullable', 'array'],
            'fields.*' => ['array'],
            'fields.*.*' => ['nullable', 'string', 'max:12000'],

            'files' => ['nullable', 'array'],
            'files.*' => [
                'file',
                'max:10240',
                'mimes:jpg,jpeg,png,webp,gif,txt,csv',
            ],

            'file_sections' => ['nullable', 'array'],
            'file_sections.*' => [
                'nullable',
                'string',
                'in:basic_info,vision_mission_values,visual_identity,personality,communication,positioning,goals',
            ],
        ]);

        $fields = $validated['fields'] ?? [];
        $files = $request->file('files', []);
        $fileSections = $validated['file_sections'] ?? [];

        /*
         * تنظيم الحقول حسب الأقسام.
         */
        $cleanFields = [];
        $emptyFields = [];

        foreach (self::SECTION_FIELDS as $sectionKey => $allowedFields) {
            foreach ($allowedFields as $fieldKey) {
                $value = $fields[$sectionKey][$fieldKey] ?? '';

                if (!is_string($value)) {
                    continue;
                }

                $cleanFields[$sectionKey][$fieldKey] = $value;

                if (trim($value) === '') {
                    $emptyFields[$sectionKey][] = $fieldKey;
                }
            }
        }

        /*
         * التأكد من وجود بيانات أو مرفقات للتحليل.
         */
        $hasText = collect($cleanFields)
            ->flatten()
            ->contains(fn ($value) => trim($value) !== '');

        if (!$hasText && empty($files)) {
            throw ValidationException::withMessages([
                'fields' => 'أدخل بيانات أو أرفق ملفات قبل بدء التحليل.',
            ]);
        }

        /*
         * إعدادات خدمات الذكاء الاصطناعي.
         */
        $geminiKey = config('services.gemini.api_key');
        $geminiModel = config('services.gemini.model');

        $groqKey = config('services.groq.api_key');
        $groqModel = config('services.groq.model');

        if (!$groqKey || !$groqModel) {
            return response()->json([
                'success' => false,
                'message' => 'إعدادات خدمة تحليل النصوص غير مكتملة.',
            ], 500);
        }

        $textDocuments = [];
        $imageAnalyses = [];

        try {
            /*
             * معالجة المرفقات حسب نوعها.
             */
            foreach ($files as $index => $file) {
                $extension = strtolower(
                    $file->getClientOriginalExtension()
                );

                $sectionKey = $fileSections[$index] ?? null;

                $content = $file->get();

                /*
                 * ملفات TXT وCSV.
                 */
                if (in_array($extension, ['txt', 'csv'], true)) {
                    $textContent = mb_convert_encoding(
                        $content,
                        'UTF-8',
                        'UTF-8'
                    );

                    $textDocuments[] = [
                        'section_key' => $sectionKey,
                        'file_name' => $file->getClientOriginalName(),
                        'content' => mb_substr(
                            $textContent,
                            0,
                            30000
                        ),
                    ];

                    continue;
                }

                /*
                 * الصور.
                 */
                if (
                    in_array(
                        $extension,
                        ['jpg', 'jpeg', 'png', 'webp', 'gif'],
                        true
                    )
                ) {
                    if (!$geminiKey || !$geminiModel) {
                        return response()->json([
                            'success' => false,
                            'message' => 'إعدادات خدمة تحليل الصور غير مكتملة.',
                        ], 500);
                    }

                    $imageResponse = Http::timeout(90)->post(
                        'https://generativelanguage.googleapis.com/v1beta/models/'
                        . $geminiModel
                        . ':generateContent?key='
                        . $geminiKey,
                        [
                            'contents' => [
                                [
                                    'parts' => [
                                        [
                                            'text' =>
                                                'حلل هذه الصورة في سياق إعداد ملف علامة تجارية. '
                                                . 'استخرج المعلومات والحقائق الظاهرة فقط، مثل اسم العلامة '
                                                . 'والمنتجات والألوان والشعار والنصوص والهوية البصرية. '
                                                . 'لا تخمن المعلومات غير الظاهرة. أجب باللغة العربية.',
                                        ],
                                        [
                                            'inline_data' => [
                                                'mime_type' => $file->getMimeType(),
                                                'data' => base64_encode($content),
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ]
                    );

                    if (!$imageResponse->successful()) {
                        throw new \RuntimeException(
                            'Gemini image analysis failed: '
                            . $imageResponse->status()
                        );
                    }

                    $imageText = collect(
                        $imageResponse->json(
                            'candidates.0.content.parts',
                            []
                        )
                    )
                        ->pluck('text')
                        ->filter()
                        ->implode("\n");

                    if ($imageText !== '') {
                        $imageAnalyses[] = [
                            'section_key' => $sectionKey,
                            'file_name' => $file->getClientOriginalName(),
                            'analysis' => $imageText,
                        ];
                    }
                }
            }

            /*
             * تجهيز تعليمات Groq.
             *
             * لا يُسمح باقتراح قيم إلا للحقول الفارغة.
             */
            $prompt = [
                'role' => 'system',

           'instructions' => [
    'أنت مساعد متخصص في تحليل ملفات العلامات التجارية.',
    'حلل جميع البيانات النصية والمرفقات المقدمة.',
    'راجع كل حقل فارغ على حدة، ولا تكتف باقتراح حقل واحد.',
    'اقترح قيمة لكل حقل فارغ تدعمه المعلومات المتاحة بوضوح.',
    'لا تقترح أي قيمة لحقل يحتوي على بيانات بالفعل.',
    'لا تخترع أسماء أو أرقامًا أو حقائق أو معلومات غير موجودة في المصادر.',
    'يمكنك تلخيص المعلومات وإعادة تنظيمها دون تغيير معناها.',
    'إذا لم تتوفر معلومات كافية لحقل معين، اتركه دون اقتراح.',
    'أعد جميع الاقتراحات في مصفوفة suggestions.',
    'يجب أن تكون جميع القيم والأسباب باللغة العربية السليمة UTF-8.',
    'أعد JSON صالحًا فقط دون Markdown أو نص إضافي.',
],

                'allowed_fields' => $emptyFields,

                'current_data' => $cleanFields,

                'text_documents' => $textDocuments,

                'image_analyses' => $imageAnalyses,

                'required_output' => [
                    'suggestions' => [
                        [
                            'section_key' => 'مفتاح القسم',
                            'field_key' => 'مفتاح الحقل',
                            'suggested_value' => 'القيمة المقترحة',
                            'reason' => 'سبب الاقتراح ومصدره',
                        ],
                    ],
                ],
            ];

            /*
             * إرسال البيانات النصية والتحليلات البصرية إلى Groq.
             */
            $groqResponse = Http::withToken($groqKey)
                ->acceptJson()
                ->timeout(120)
                ->post(
                    'https://api.groq.com/openai/v1/chat/completions',
                    [
                        'model' => $groqModel,

                        'messages' => [
                            [
                                'role' => 'system',
                                'content' =>
                                    'أعد استجابة JSON صالحة فقط وفق البنية المطلوبة. '
                                    . 'لا تضف أي نص خارج JSON.',
                            ],
                            [
                                'role' => 'user',
                                'content' => json_encode(
                                    $prompt,
                                    JSON_UNESCAPED_UNICODE
                                    | JSON_UNESCAPED_SLASHES
                                ),
                            ],
                        ],

                        'temperature' => 0.2,
                    ]
                );

            if (!$groqResponse->successful()) {
                throw new \RuntimeException(
                    'Groq analysis failed: '
                    . $groqResponse->status()
                );
            }

            /*
             * قراءة استجابة النموذج.
             */
            $content = $groqResponse->json(
                'choices.0.message.content'
            );
            Log::info('Brand Profile AI Raw Response', [
                'content' => $content,
            ]);
            if (!is_string($content) || trim($content) === '') {
                throw new \RuntimeException(
                    'Empty AI response.'
                );
            }

            /*
             * إزالة علامات Markdown إن أعادها النموذج.
             */
            $content = trim($content);

            $content = preg_replace(
                '/^```(?:json)?\s*/i',
                '',
                $content
            );

            $content = preg_replace(
                '/\s*```$/',
                '',
                $content
            );

            $result = json_decode($content, true);

            if (
                !is_array($result) ||
                !isset($result['suggestions']) ||
                !is_array($result['suggestions'])
            ) {
                throw new \RuntimeException(
                    'Invalid AI JSON response.'
                );
            }

            /*
             * التحقق من الاقتراحات قبل إعادتها للواجهة.
             */
            $suggestions = [];

            foreach ($result['suggestions'] as $suggestion) {
                if (!is_array($suggestion)) {
                    continue;
                }

                $sectionKey = $suggestion['section_key'] ?? '';
                $fieldKey = $suggestion['field_key'] ?? '';
                $value = $suggestion['suggested_value'] ?? null;

                /*
                 * التحقق من اسم القسم والحقل.
                 */
                if (
                    !isset(self::SECTION_FIELDS[$sectionKey]) ||
                    !in_array(
                        $fieldKey,
                        self::SECTION_FIELDS[$sectionKey],
                        true
                    )
                ) {
                    continue;
                }

                /*
                 * منع اقتراح قيم للحقول المعبأة.
                 */
                if (
                    !in_array(
                        $fieldKey,
                        $emptyFields[$sectionKey] ?? [],
                        true
                    )
                ) {
                    continue;
                }

                if (
                    !is_string($value) ||
                    trim($value) === ''
                ) {
                    continue;
                }

                $suggestions[] = [
                    'section_key' => $sectionKey,
                    'field_key' => $fieldKey,
                    'suggested_value' => trim($value),

                    'reason' => is_string(
                        $suggestion['reason'] ?? null
                    )
                        ? $suggestion['reason']
                        : '',
                ];
            }

            /*
             * إعادة الاقتراحات إلى الواجهة دون حفظها.
             */
            return response()->json([
                'success' => true,

                'suggestions' => $suggestions,

                'message' => count($suggestions)
                    ? 'اكتمل التحليل وتم العثور على اقتراحات.'
                    : 'اكتمل التحليل، ولم نعثر على اقتراحات مناسبة للحقول الفارغة.',
            ]);

        } catch (\Throwable $exception) {
            Log::error(
                'Brand Profile AI analysis failed.',
                [
                    'exception' => $exception->getMessage(),
                ]
            );

            return response()->json([
                'success' => false,
                'message' => 'تعذر إكمال التحليل. تحقق من اتصال خدمات الذكاء الاصطناعي وحاول مجددًا.',
            ], 502);
        }
    }
}
