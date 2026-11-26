<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Services\BrandGeneratorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    /**
     * يستقبل البيانات الأساسية للعلامة التجارية، يولّد هوية مقترحة عبر Groq API،
     * ويعيدها بصيغة JSON للواجهة ليراجعها المستخدم ويعدّلها قبل الحفظ.
     */
    public function generate(Request $request, BrandGeneratorService $generator)
    {
        $validated = $request->validate([
            'name'              => ['required', 'string', 'max:150'],
            'industry'          => ['required', 'string', 'max:100'],
            'geo_scope'         => ['nullable', 'string', 'max:150'],
            'products_services' => ['required', 'string'],
            'preferred_dialect' => ['nullable', 'string', 'max:50'],
        ]);

        try {
            $generated = $generator->generateFromInput($validated);

            return response()->json([
                'ok'   => true,
                'data' => $generated,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'ok'      => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * يحفظ أو يحدّث بيانات Brand DNA في جدول brands لمساحة عمل المستخدم الحالي (علاقة 1:1).
     */
    public function storeOrUpdate(Request $request)
    {
        $user = Auth::user();

        abort_unless($user && $user->workspace_id, 403, 'المستخدم غير مرتبط بمساحة عمل.');

        $validated = $request->validate([
            'name'                 => ['required', 'string', 'max:150'],
            'industry'             => ['required', 'string', 'max:100'],
            'geo_scope'            => ['nullable', 'string', 'max:150'],
            'products_services'    => ['required', 'string'],
            'uvp'                  => ['nullable', 'string'],
            'color_primary'        => ['nullable', 'string', 'max:20'],
            'color_secondary'      => ['nullable', 'string', 'max:20'],
            'color_accent'         => ['nullable', 'string', 'max:20'],
            'brand_personality'    => ['nullable', 'string', 'max:100'],
            'tone_of_voice'        => ['nullable', 'string', 'max:100'],
            'preferred_dialect'    => ['nullable', 'string', 'max:50'],
            'business_goals'       => ['nullable', 'string'],

            // ركائز التموضع الذهني الأربعة
            'pillar_1_title'       => ['nullable', 'string', 'max:120'],
            'pillar_1_description' => ['nullable', 'string', 'max:255'],
            'pillar_2_title'       => ['nullable', 'string', 'max:120'],
            'pillar_2_description' => ['nullable', 'string', 'max:255'],
            'pillar_3_title'       => ['nullable', 'string', 'max:120'],
            'pillar_3_description' => ['nullable', 'string', 'max:255'],
            'pillar_4_title'       => ['nullable', 'string', 'max:120'],
            'pillar_4_description' => ['nullable', 'string', 'max:255'],
        ]);

        // تحويل الأهداف المكتوبة سطراً بسطر إلى مصفوفة نظيفة
        $goalsArray = collect(preg_split('/\r\n|\r|\n/', $validated['business_goals'] ?? ''))
            ->map(fn ($line) => trim($line))
            ->filter()
            ->values()
            ->all();

        // تجهيز ركائز التموضع الذهني الأربعة كحقول إدخال قابلة للتعديل والحفظ
        $pillars = [
            [
                'title'       => $validated['pillar_1_title'] ?? 'علامة تصنع مشاعر',
                'description' => $validated['pillar_1_description'] ?? 'هدية تحمل رسالة وقصة إنسانية.',
            ],
            [
                'title'       => $validated['pillar_2_title'] ?? 'تهتم بالتفاصيل',
                'description' => $validated['pillar_2_description'] ?? 'دقة تناسق الألوان وبصمة التغليف.',
            ],
            [
                'title'       => $validated['pillar_3_title'] ?? 'علامة مخصصة',
                'description' => $validated['pillar_3_description'] ?? 'الأسماء والعبارات والتواريخ الخاصة.',
            ],
            [
                'title'       => $validated['pillar_4_title'] ?? 'علامة أنيقة',
                'description' => $validated['pillar_4_description'] ?? 'تقديم بصري راقٍ يرفع قيمة الهدية.',
            ],
        ];

        Brand::updateOrCreate(
            ['workspace_id' => $user->workspace_id],
            [
                'name'                  => $validated['name'],
                'industry'              => $validated['industry'],
                'products_services'     => $validated['products_services'],
                'uvp'                   => $validated['uvp'] ?? null,
                'brand_personality'     => $validated['brand_personality'] ?? null,
                'tone_of_voice'         => $validated['tone_of_voice'] ?? null,
                'preferred_dialect'     => $validated['preferred_dialect'] ?? 'MSA',
                'vision_mission_values' => [
                    'positioning_pillars' => $pillars,
                ],
                'visual_identity'       => [
                    'primary_color'   => $validated['color_primary'] ?? '#BE185D',
                    'secondary_color' => $validated['color_secondary'] ?? '#D97706',
                    'accent_color'    => $validated['color_accent'] ?? '#FDF2F8',
                    'geo_scope'       => $validated['geo_scope'] ?? null,
                ],
                'business_goals'        => $goalsArray,
            ]
        );

        return back()->with('success', 'تم حفظ وتحديث ملف Brand DNA بنجاح!');
    }
}