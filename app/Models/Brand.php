<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory, HasUuids;

    /**
     * اسم الجدول المرتبط بالنموذج في قاعدة البيانات.
     */
    protected $table = 'brands';

    /**
     * الحقول المسموح بتعبئتها جماعياً لتخزين هوية المشروع (Brand DNA).
     */
    protected $fillable = [
        'workspace_id',          // مساحة العمل المالكة للعلامة التجارية
        'name',                  // اسم العلامة التجارية أو المشروع
        'industry',              // القطاع أو المجال التجاري
        'products_services',     // وصف المنتجات أو الخدمات
        'vision_mission_values', // الرؤية والرسالة والقيم (JSON)
        'visual_identity',       // الهوية البصرية: الألوان، الخطوط، الشعار (JSON)
        'brand_personality',     // شخصية العلامة التجارية
        'tone_of_voice',         // نبرة الصوت في الخطاب التسويقي
        'preferred_dialect',     // اللهجة أو اللغة المفضلة (الافتراضي: MSA)
        'uvp',                   // الميزة التنافسية والقيمة المقدمة
        'business_goals',        // الأهداف التجارية والتسويقية (JSON)
    ];

    /**
     * تحويل حقول JSON إلى مصفوفات PHP تلقائياً عند الوصول إليها وحفظها.
     */
    protected $casts = [
        'vision_mission_values' => 'array',
        'visual_identity'       => 'array',
        'business_goals'        => 'array',
    ];

    /**
     * يرجع مساحة العمل التي تتبع لها العلامة التجارية.
     */
    public function workspace()
    {
        return $this->belongsTo(Workspace::class, 'workspace_id');
    }

    /**
     * علاقة 1:N: يرجع شرائح الجمهور وشخصيات العملاء التابعة للعلامة التجارية.
     */
    public function audiencePersonas()
    {
        return $this->hasMany(AudiencePersona::class, 'brand_id');
    }

    /**
     * علاقة 1:N: يرجع المنافسين المسجلين للعلامة التجارية.
     */
    public function competitors()
    {
        return $this->hasMany(Competitor::class, 'brand_id');
    }

    /**
     * علاقة 1:N: يرجع رؤى السوق والاتجاهات المرصودة للعلامة التجارية.
     */
    public function marketInsights()
    {
        return $this->hasMany(MarketInsight::class, 'brand_id');
    }
}