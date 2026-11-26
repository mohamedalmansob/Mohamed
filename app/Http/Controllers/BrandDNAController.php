<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use JsonException;

class BrandDNAController extends Controller
{
    public function save(Request $request): JsonResponse
    {
        /*
        |--------------------------------------------------------------------------
        | 1. التحقق من مدخلات Brand DNA
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'industry' => ['required', 'string', 'max:100'],
            'geographic_scope' => ['nullable', 'string', 'max:255'],
            'products_services' => ['required', 'string'],
            'uvp' => ['nullable', 'string'],
            'primary_color' => ['nullable', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'secondary_color' => ['nullable', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'accent_color' => ['nullable', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'visual_style' => ['nullable', 'string', 'max:255'],
            'tone_of_voice' => ['required', 'string', 'max:100'],
            'preferred_dialect' => ['required', 'string', 'max:50'],
            'business_goals' => ['nullable', 'string'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | 2. تجهيز البيانات وإزالة الترقيم من الأهداف
        |--------------------------------------------------------------------------
        */

        $input = [
            'name' => trim($validated['name']),
            'industry' => trim($validated['industry']),
            'geographic_scope' => $validated['geographic_scope'] ?? '',
            'products_services' => trim($validated['products_services']),
            'uvp' => $validated['uvp'] ?? '',
            'primary_color' => $validated['primary_color'] ?? '#BE185D',
            'secondary_color' => $validated['secondary_color'] ?? '#D97706',
            'accent_color' => $validated['accent_color'] ?? '#FDF2F8',
            'visual_style' => $validated['visual_style'] ?? '',
            'tone_of_voice' => $validated['tone_of_voice'],
            'preferred_dialect' => $validated['preferred_dialect'],
            'business_goals' => $validated['business_goals'] ?? '',
        ];

        $originalGoals = collect(
            preg_split('/\r\n|\r|\n/', $input['business_goals'])
        )
            ->map(fn ($goal) => trim(
                preg_replace('/^\d+[\.\-\)]\s*/', '', $goal)
            ))
            ->filter()
            ->values()
            ->all();

        $input['business_goals'] = $originalGoals;

        /*
        |--------------------------------------------------------------------------
        | 3. التحقق من إعدادات Groq
        |--------------------------------------------------------------------------
        */

        $apiKey = config('services.groq.api_key');
        $model = config('services.groq.model');
        $baseUrl = config('services.groq.base_url');

        if (!$apiKey || !$model || !$baseUrl) {
            Log::error('Groq configuration is incomplete.');

            return response()->json([
                'message' => 'إعدادات خدمة الذكاء الاصطناعي غير مكتملة.',
            ], 500);
        }

        /*
        |--------------------------------------------------------------------------
        | 4. تعريف بنية الملف التسويقي المطلوب
        |--------------------------------------------------------------------------
        */

        $schema = [
            'type' => 'object',

            'properties' => [

                'name' => [
                    'type' => 'string',
                ],

                'industry' => [
                    'type' => 'string',
                ],

                'products_services' => [
                    'type' => 'string',
                ],

                'vision_mission_values' => [
                    'type' => 'object',

                    'properties' => [

                        'vision' => [
                            'type' => 'string',
                        ],

                        'mission' => [
                            'type' => 'string',
                        ],

                        'values' => [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                            ],
                        ],

                    ],

                    'required' => [
                        'vision',
                        'mission',
                        'values',
                    ],

                    'additionalProperties' => false,
                ],

                'visual_identity' => [
                    'type' => 'object',

                    'properties' => [

                        'geographic_scope' => [
                            'type' => 'string',
                        ],

                        'primary_color' => [
                            'type' => 'string',
                        ],

                        'secondary_color' => [
                            'type' => 'string',
                        ],

                        'accent_color' => [
                            'type' => 'string',
                        ],

                        'style' => [
                            'type' => 'string',
                        ],

                    ],

                    'required' => [
                        'geographic_scope',
                        'primary_color',
                        'secondary_color',
                        'accent_color',
                        'style',
                    ],

                    'additionalProperties' => false,
                ],

                'brand_personality' => [
                    'type' => 'string',
                ],

                'tone_of_voice' => [
                    'type' => 'string',
                ],

                'preferred_dialect' => [
                    'type' => 'string',
                ],

                'uvp' => [
                    'type' => 'string',
                ],

                'business_goals' => [
                    'type' => 'array',

                    'items' => [
                        'type' => 'string',
                    ],
                ],

            ],

            'required' => [
                'name',
                'industry',
                'products_services',
                'vision_mission_values',
                'visual_identity',
                'brand_personality',
                'tone_of_voice',
                'preferred_dialect',
                'uvp',
                'business_goals',
            ],

            'additionalProperties' => false,
        ];

        /*
        |--------------------------------------------------------------------------
        | 5. منهجية التحليل الاستراتيجي
        |--------------------------------------------------------------------------
        */

        $systemPrompt = <<<'PROMPT'
أنت المستشار الاستراتيجي الرئيسي لمنصة مسبار MISBAR،
ومتخصص في بناء العلامات التجارية والتسويق والاستراتيجية التجارية.
مهمتك ليست إعادة صياغة بيانات المستخدم أو تلخيصها،
بل تحليلها وتحويلها إلى ملف Brand DNA احترافي
يمكن الاعتماد عليه كأساس للقرارات التسويقية والإبداعية المستقبلية.
تعامل مع كل مشروع باعتباره مشروعاً مستقلاً له سوقه
وجمهوره وطبيعته وقيمته الخاصة.
اتبع المنهجية التالية بدقة:
المرحلة الأولى: فهم المشروع وتحليل هويته
- افهم طبيعة النشاط والقطاع والمنتجات والخدمات.
- حدد المشكلة الأساسية التي يحاول المشروع حلها.
- افهم القيمة التي يحصل عليها العميل.
- ميّز بين خصائص المنتج والفائدة الحقيقية التي يقدمها.
- افهم النطاق الجغرافي وطبيعة السوق المستهدف.
- حافظ على الحقائق التي قدمها المستخدم ولا تغيرها.
المرحلة الثانية: تحليل الجمهور واحتياجاته
- استنتج أنواع العملاء المحتملين بصورة منطقية.
- حدد احتياجاتهم ودوافع الشراء لديهم.
- حدد المشكلات التي يحاولون التخلص منها.
- افهم العوامل العاطفية والعملية المؤثرة في قرار الشراء.
- اربط قيمة العلامة التجارية باحتياجات هؤلاء العملاء.
- لا تدّع امتلاك بيانات ديموغرافية أو إحصائية لم يقدمها المستخدم.

المرحلة الثالثة: تحليل السوق والتموضع التنافسي
- افهم طبيعة المنافسة المتوقعة في القطاع.
- حدد أنواع البدائل التي قد يلجأ إليها العميل.
- ابحث عن زوايا التميز الممكنة للعلامة التجارية.
- حدد التموضع الذي يمكن أن يمنح المشروع هوية واضحة.
- لا تختلق أسماء منافسين أو أسعاراً أو حصصاً سوقية.
- لا تدّع إجراء بحث ميداني أو تحليل بيانات خارجية.

المرحلة الرابعة: بناء القيمة والميزة التنافسية
- حدد السبب الحقيقي الذي يجعل العميل يختار هذه العلامة.
- لا تستخدم عبارات عامة مثل الجودة والتميز فقط.
- اجعل القيمة المقترحة مرتبطة بالمنتج والجمهور والسوق.
- وضح الفرق بين العلامة والبدائل المحتملة.
- صغ UVP واضحة ومقنعة ومحددة.

المرحلة الخامسة: بناء الرؤية والرسالة والقيم
- الرؤية: تصور طموح وواقعي لما تريد العلامة أن تصبح عليه.
- الرسالة: سبب وجود المشروع وما يقدمه ولمن وكيف.
- القيم: مبادئ عملية توجه القرارات والسلوك والتعامل مع العملاء.
- اجعل هذه العناصر مترابطة وغير متناقضة.

المرحلة السادسة: بناء الشخصية والهوية البصرية
- استنتج شخصية العلامة من طبيعة المشروع وجمهوره وقيمه.
- حدد السمات الشخصية الأساسية بصورة محددة.
- اجعل الأسلوب البصري متوافقاً مع الشخصية والسوق.
- احتفظ بأكواد الألوان التي قدمها المستخدم دون تغيير.
- لا تقترح هوية بصرية تناقض طبيعة المنتجات أو توقعات العملاء.

المرحلة السابعة: بناء استراتيجية التواصل
- حدد النبرة المناسبة للجمهور وطبيعة النشاط.
- اجعل اللغة متسقة مع شخصية العلامة.
- حدد أسلوب مخاطبة العملاء.
- تجنب المبالغة والوعود غير القابلة للإثبات.
- التزم باللهجة أو اللغة التي اختارها المستخدم.

المرحلة الثامنة: بناء الأهداف التجارية والتسويقية
- حوّل أهداف المستخدم إلى أهداف واضحة وقابلة للتنفيذ.
- اجعل الأهداف مرتبطة بمرحلة المشروع وإمكاناته.
- راعِ الوعي بالعلامة وجذب العملاء والتحويل والاحتفاظ بهم.
- استخدم مؤشرات قياس مناسبة عندما تتوفر معلومات كافية.
- لا تخترع أرقاماً أو ميزانيات أو مواعيد أو نتائج مضمونة.
- أخرج من 4 إلى 7 أهداف استراتيجية مفيدة وغير مكررة.

قواعد أساسية ملزمة:
1. لا تكرر مدخلات المستخدم كما هي دون تحليل وتطوير.
2. لا تختلق حقائق عن المشروع أو العملاء أو السوق.
3. فرّق بين المعلومات المؤكدة والاستنتاجات الاستراتيجية.
4. اجعل كل نتيجة متوافقة مع بقية عناصر Brand DNA.
5. لا تستخدم عبارات تسويقية فضفاضة أو مكررة.
6. لا تجعل جميع العلامات التجارية تبدو متشابهة.
7. لا تقدم نصائح عامة يمكن تطبيقها على أي مشروع.
8. اجعل المخرجات احترافية ومحددة وقابلة للاستخدام.
9. استخدم اللغة العربية الواضحة والاحترافية.
10. أخرج النتيجة وفق مخطط JSON المحدد فقط.

تعليمات خاصة ببنية المخرجات:

- name: اسم العلامة كما قدمه المستخدم.
- industry: القطاع كما قدمه المستخدم.
- products_services: وصف دقيق للمنتجات والخدمات مع تحسين الوضوح دون اختراع منتجات.
- vision_mission_values: رؤية ورسالة وقيم مترابطة ومخصصة للمشروع.
- visual_identity: احتفظ بالنطاق الجغرافي وأكواد الألوان المدخلة، وطوّر الوصف البصري.
- brand_personality: وصف مركز لشخصية العلامة لا يتجاوز 100 حرف.
- tone_of_voice: نبرة تواصل عملية ومميزة لا تتجاوز 100 حرف.
- preferred_dialect: احتفظ باللغة أو اللهجة التي اختارها المستخدم.
- uvp: قيمة مقترحة استراتيجية واضحة تشرح سبب اختيار العميل للعلامة.
- business_goals: من 4 إلى 7 أهداف استراتيجية محددة وقابلة للتنفيذ.

يجب أن تكون جميع الحقول مترابطة استراتيجياً،
وألا يتناقض التموضع والقيمة المقترحة والشخصية والأهداف.
PROMPT;

        /*
        |--------------------------------------------------------------------------
        | 6. إرسال البيانات إلى Groq
        |--------------------------------------------------------------------------
        */

        try {

            $response = Http::withToken($apiKey)
                ->acceptJson()
                ->timeout(180)
                ->post(
                    rtrim($baseUrl, '/') . '/chat/completions',
                    [
                        'model' => $model,

                        'messages' => [
                            [
                                'role' => 'system',
                                'content' => $systemPrompt,
                            ],
                            [
                                'role' => 'user',
                                'content' =>
                                    "حلل بيانات المشروع التالية وأنشئ ملف Brand DNA استراتيجياً متكاملاً.\n\n"
                                    . json_encode(
                                        $input,
                                        JSON_UNESCAPED_UNICODE |
                                        JSON_PRETTY_PRINT |
                                        JSON_THROW_ON_ERROR
                                    ),
                            ],
                        ],

                        'reasoning_effort' => 'high',

                        'response_format' => [
                            'type' => 'json_schema',

                            'json_schema' => [
                                'name' => 'misbar_brand_dna',
                                'strict' => true,
                                'schema' => $schema,
                            ],
                        ],
                    ]
                );

        } catch (\Throwable $e) {

            Log::error('Groq connection or request failed', [
                'message' => $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'تعذر الاتصال بخدمة الذكاء الاصطناعي. لم يتم حفظ أي بيانات.',
            ], 502);
        }

        /*
        |--------------------------------------------------------------------------
        | 7. التحقق من نجاح استجابة Groq
        |--------------------------------------------------------------------------
        */

        if (!$response->successful()) {

            Log::error('Groq API error', [
                'status' => $response->status(),
                'body' => $response->json(),
            ]);

            return response()->json([
                'message' => 'فشل التحليل الاستراتيجي. لم يتم حفظ أي بيانات.',
            ], 502);
        }

        $choice = $response->json('choices.0');

        if (
            !is_array($choice) ||
            ($choice['finish_reason'] ?? null) !== 'stop'
        ) {

            Log::error('Groq response was incomplete', [
                'finish_reason' => $choice['finish_reason'] ?? null,
            ]);

            return response()->json([
                'message' => 'لم يكتمل توليد الملف التسويقي. لم يتم حفظ أي بيانات.',
            ], 502);
        }

        $message = $choice['message'] ?? [];

        if (!empty($message['refusal'])) {

            return response()->json([
                'message' => 'تعذر على النموذج إكمال التحليل المطلوب.',
            ], 502);
        }

        $content = $message['content'] ?? null;

        if (!is_string($content) || trim($content) === '') {

            return response()->json([
                'message' => 'لم يُرجع النموذج نتائج صالحة. لم يتم الحفظ.',
            ], 502);
        }

        /*
        |--------------------------------------------------------------------------
        | 8. تحويل مخرجات النموذج إلى JSON
        |--------------------------------------------------------------------------
        */

        try {

            $profile = json_decode(
                $content,
                true,
                512,
                JSON_THROW_ON_ERROR
            );

        } catch (JsonException $e) {

            Log::error('Groq returned invalid JSON', [
                'message' => $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'تعذر قراءة نتائج التحليل. لم يتم حفظ أي بيانات.',
            ], 502);
        }

        /*
        |--------------------------------------------------------------------------
        | 9. التحقق من اكتمال جميع الحقول قبل الحفظ
        |--------------------------------------------------------------------------
        */

        $profileValidator = Validator::make($profile, [

            'name' => ['required', 'string', 'max:150'],

            'industry' => ['required', 'string', 'max:100'],

            'products_services' => ['required', 'string'],

            'vision_mission_values' => ['required', 'array'],

            'vision_mission_values.vision' => ['required', 'string'],

            'vision_mission_values.mission' => ['required', 'string'],

            'vision_mission_values.values' => [
                'required',
                'array',
                'min:3',
            ],

            'vision_mission_values.values.*' => [
                'required',
                'string',
            ],

            'visual_identity' => ['required', 'array'],

            'visual_identity.geographic_scope' => [
                'required',
                'string',
            ],

            'visual_identity.primary_color' => [
                'required',
                'regex:/^#[0-9A-Fa-f]{6}$/',
            ],

            'visual_identity.secondary_color' => [
                'required',
                'regex:/^#[0-9A-Fa-f]{6}$/',
            ],

            'visual_identity.accent_color' => [
                'required',
                'regex:/^#[0-9A-Fa-f]{6}$/',
            ],

            'visual_identity.style' => [
                'required',
                'string',
            ],

            'brand_personality' => [
                'required',
                'string',
                'max:100',
            ],

            'tone_of_voice' => [
                'required',
                'string',
                'max:100',
            ],

            'preferred_dialect' => [
                'required',
                'string',
                'max:50',
            ],

            'uvp' => [
                'required',
                'string',
            ],

            'business_goals' => [
                'required',
                'array',
                'min:4',
                'max:7',
            ],

            'business_goals.*' => [
                'required',
                'string',
            ],

        ]);

        if ($profileValidator->fails()) {

            Log::error('Groq profile validation failed', [
                'errors' => $profileValidator->errors()->toArray(),
            ]);

            return response()->json([
                'message' => 'الملف التسويقي الناتج غير مكتمل أو غير صالح. لم يتم الحفظ.',
            ], 502);
        }

        $profile = $profileValidator->validated();

        /*
        |--------------------------------------------------------------------------
        | 10. حماية بيانات المستخدم الأساسية من التغيير
        |--------------------------------------------------------------------------
        |
        | النموذج يطور التحليل، لكنه لا يغير الحقائق الأصلية
        | مثل اسم العلامة والقطاع والألوان والنطاق الجغرافي.
        |
        */

        $profile['name'] = $input['name'];

        $profile['industry'] = $input['industry'];

        $profile['products_services'] = $input['products_services'];

        $profile['preferred_dialect'] = $input['preferred_dialect'];

        $profile['visual_identity']['geographic_scope'] =
            $input['geographic_scope'];

        $profile['visual_identity']['primary_color'] =
            $input['primary_color'];

        $profile['visual_identity']['secondary_color'] =
            $input['secondary_color'];

        $profile['visual_identity']['accent_color'] =
            $input['accent_color'];

        /*
        |--------------------------------------------------------------------------
        | 11. حفظ الملف بعد نجاح التحليل فقط
        |--------------------------------------------------------------------------
        */

        try {

            $brand = DB::transaction(function () use ($request, $profile) {

                return Brand::updateOrCreate(
                    [
                        'workspace_id' => $request->user()->workspace_id,
                    ],
                    $profile
                );

            });

        } catch (\Throwable $e) {

            Log::error('Brand DNA database save failed', [
                'message' => $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'نجح التحليل، لكن تعذر حفظ الملف في قاعدة البيانات.',
            ], 500);
        }

        /*
        |--------------------------------------------------------------------------
        | 12. إعادة نتيجة العملية إلى الواجهة
        |--------------------------------------------------------------------------
        */

        return response()->json([
            'message' => 'اكتمل التحليل الاستراتيجي وحُفظ ملف Brand DNA بنجاح.',
            'brand_id' => $brand->id,
        ]);
    }
}
