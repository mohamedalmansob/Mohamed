<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class BrandProfileController extends Controller
{
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

    private const REQUIRED_FIELDS = [
        'basic_info' => [
            'name',
            'industry',
            'business_description',
        ],

        'vision_mission_values' => [
            'vision',
            'mission',
            'values',
        ],

        'visual_identity' => [
            'primary_color',
            'visual_description',
        ],

        'personality' => [
            'personality_description',
            'personality_traits',
        ],

        'communication' => [
            'tone_description',
            'language',
            'writing_style',
        ],

        'positioning' => [
            'competitive_advantage',
            'value_proposition',
        ],

        'goals' => [
            'business_goals',
            'marketing_goals',
        ],
    ];

    /**
     * مساحة العمل التجريبية.
     */
    private function getWorkspace(): Workspace
    {
        return Workspace::query()->firstOrFail();
    }

    /**
     * عرض ملف العلامة بالرابط السابق.
     */
    public function show()
    {
        $workspace = $this->getWorkspace();

        $brand = Brand::firstOrCreate([
            'workspace_id' => $workspace->id,
        ]);

        $approvalUrls = [];

        foreach (array_keys(self::SECTION_FIELDS) as $section) {
            $approvalUrls[$section] = route(
                'brand-profile.sections.approve',
                ['section' => $section]
            );
        }

        return view('misbar.workspace.brand-profile', [
            'activeUnit' => 'brand',
            'brand' => $brand,
            'workspaceId' => $workspace->id,
            'aiUrl' => route('brand-profile.analyze'),
            'approvalUrls' => $approvalUrls,
        ]);
    }

    /**
     * اعتماد قسم واحد وحفظ بياناته.
     */
    public function approve(Request $request, string $section)
    {
        if (!array_key_exists($section, self::SECTION_FIELDS)) {
            abort(404);
        }

        $validated = $request->validate([
            'fields' => ['required', 'array'],
            'fields.*' => ['nullable', 'string', 'max:12000'],
        ]);

        $allowedFields = self::SECTION_FIELDS[$section];

        $fields = array_intersect_key(
            $validated['fields'],
            array_flip($allowedFields)
        );

        $missingFields = [];

        foreach (self::REQUIRED_FIELDS[$section] as $field) {
            if (
                !isset($fields[$field]) ||
                trim($fields[$field]) === ''
            ) {
                $missingFields[] = $field;
            }
        }

        if (!empty($missingFields)) {
            throw ValidationException::withMessages([
                'fields' => [
                    'لا يمكن اعتماد القسم. الحقول الإلزامية غير المكتملة: '
                    . implode('، ', $missingFields),
                ],
            ]);
        }

        $result = DB::transaction(function () use ($section, $fields) {
            $workspace = Workspace::query()
                ->whereKey($this->getWorkspace()->id)
                ->lockForUpdate()
                ->firstOrFail();

            $brand = Brand::firstOrCreate([
                'workspace_id' => $workspace->id,
            ]);

            $profileData = $brand->profile_data ?? [];
            $approvedProfile = $brand->approved_profile ?? [];
            $sectionStatus = $brand->section_status ?? [];

            $newVersion = ((int) $brand->profile_version) + 1;
            $approvedAt = now()->toISOString();

            $profileData[$section] = $fields;

            $approvedProfile[$section] = [
                'data' => $fields,
                'version' => $newVersion,
                'approved_at' => $approvedAt,
            ];

            $sectionStatus[$section] = [
                'status' => 'approved',
                'version' => $newVersion,
                'approved_at' => $approvedAt,
            ];

            $brand->profile_data = $profileData;
            $brand->approved_profile = $approvedProfile;
            $brand->section_status = $sectionStatus;
            $brand->profile_version = $newVersion;
            $brand->approved_at = $approvedAt;

            $brand->save();

            return [
                'section' => $section,
                'profile_version' => $newVersion,
                'approved_at' => $approvedAt,
            ];
        });

        return response()->json([
            'success' => true,
            'message' => 'تم اعتماد القسم وحفظ بياناته بنجاح.',
            'data' => $result,
        ]);
    }
}
