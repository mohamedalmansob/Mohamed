<?php

namespace App\Services;

// واجهة Http الجاهزة في Laravel لإرسال طلبات REST API بسهولة وأمان
use Illuminate\Support\Facades\Http;
// استثناء قياسي لرمي أخطاء واضحة عند فشل التهيئة أو الاتصال أو تحليل البيانات
use RuntimeException;

/**
 * خدمة توليد ملف هوية العلامة التجارية (Brand DNA) بالذكاء الاصطناعي عبر Groq API.
 */
class BrandGeneratorService
{
    // رابط نقطة النهاية (Endpoint) الخاصة بمحادثات Groq والمتوافقة مع معيار OpenAI Chat Completions
    private const ENDPOINT = 'https://api.groq.com/openai/v1/chat/completions';

    /**
     * يولّد ملف Brand DNA مهيكل من البيانات الأساسية للعلامة التجارية عبر Groq API.
     *
     * @param  array<string, mixed>  $input  البيانات الأولية المدخلة من المستخدم (الاسم، القطاع، النطاق، المنتجات، اللهجة)
     * @return array<string, mixed>           مصفوفة منظمة تطابق حقول Brand DNA المطلوبة
     */
    public function generateFromInput(array $input): array
    {
        // قراءة مفتاح API واسم النموذج من ملف الإعدادات config/services.php
        $apiKey = config('services.groq.api_key');
        $model  = config('services.groq.model', 'openai/gpt-oss-120b');

        // إيقاف التنفيذ فوراً برسالة واضحة إذا لم يتم ضبط مفتاح GROQ_API_KEY
        if (! $apiKey) {
            throw new RuntimeException('مفتاح GROQ_API_KEY غير مضبوط في ملف .env.');
        }

        // توجيه النظام (System Prompt): يحدد دور النموذج ويلزمه بإرجاع JSON صافٍ بالمفاتيح المطلوبة فقط
        $systemPrompt = 'أنت خبير استراتيجية علامات تجارية وتسويق. أعد كائن JSON صالحاً فقط بدون أي نص خارجي أو علامات markdown، يحتوي على المفاتيح التالية باللغة المناسبة للمدخلات: '
            . '{"uvp": "string", "brand_personality": "string", "tone_of_voice": "string", '
            . '"positioning_pillars": [{"title": "string", "description": "string"}, {"title": "string", "description": "string"}, {"title": "string", "description": "string"}, {"title": "string", "description": "string"}], '
            . '"business_goals": ["string", "string", "string", "string"]}.';

        // تحويل بيانات العلامة التجارية المدخلة إلى نص JSON مع إبقاء الأحرف العربية واضحة (JSON_UNESCAPED_UNICODE)
        $userPrompt = json_encode([
            'brand_name'        => $input['name'] ?? '',
            'industry'          => $input['industry'] ?? '',
            'geo_scope'         => $input['geo_scope'] ?? '',
            'products_services' => $input['products_services'] ?? '',
            'preferred_dialect' => $input['preferred_dialect'] ?? 'MSA',
        ], JSON_UNESCAPED_UNICODE);

        // إرسال طلب POST إلى Groq مع التوثيق بالـ Bearer Token ومهلة انتظار 30 ثانية
        $response = Http::withToken($apiKey)
            ->timeout(30)
            ->post(self::ENDPOINT, [
                'model'           => $model, // النموذج المختار للتوليد
                'temperature'     => 0.6,    // درجة إبداع متوازنة تحافظ على الاتساق والدقة
                'response_format' => ['type' => 'json_object'], // إلزام النموذج بإخراج كائن JSON صالح
                'messages'        => [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => $userPrompt],
                ],
            ]);

        // التحقق من نجاح الطلب HTTP (حالة 2xx) ورمي استثناء بتفاصيل الخطأ عند الفشل
        if ($response->failed()) {
            throw new RuntimeException('فشل الاتصال بـ Groq API: ' . $response->body());
        }

        // استخراج النص الناتج من أول خيار في استجابة النموذج
        $rawContent = data_get($response->json(), 'choices.0.message.content', '');

        // تحويل نص JSON إلى مصفوفة PHP ترابطية (Associative Array)
        $decoded = json_decode($rawContent, true);

        // التأكد من أن الناتج مصفوفة صالحة قبل الوصول إلى مفاتيحه
        if (! is_array($decoded)) {
            throw new RuntimeException('تعذّر تحليل مخرجات JSON القادمة من Groq.');
        }

        // إرجاع المخرجات النهائية بعد ضبط الأنواع وقص الركائز إلى 4 عناصر كحد أقصى
        return [
            'uvp'                 => (string) ($decoded['uvp'] ?? ''),
            'brand_personality'   => (string) ($decoded['brand_personality'] ?? ''),
            'tone_of_voice'       => (string) ($decoded['tone_of_voice'] ?? ''),
            'positioning_pillars' => array_slice((array) ($decoded['positioning_pillars'] ?? []), 0, 4),
            'business_goals'      => array_values((array) ($decoded['business_goals'] ?? [])),
        ];
    }
}