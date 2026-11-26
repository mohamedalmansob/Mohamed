<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * إنشاء جدول العلامات التجارية / المشاريع (brands) لتخزين هوية المشروع (Brand DNA).
     */
    public function up(): void
    {
        Schema::create('brands', function (Blueprint $table) {
            // المعرّف الفريد للعلامة التجارية أو المشروع بصيغة UUID
            $table->uuid('id')->primary();

            // ربط المشروع بمساحة العمل التابعة له؛ وعند حذف مساحة العمل تُحذف مشاريعها تلقائياً
            $table->foreignUuid('workspace_id')
                ->constrained('workspaces')
                ->cascadeOnDelete();

            // اسم العلامة التجارية أو المشروع (مثال: فلوريا أو مشروع منى)
            $table->string('name', 150);

            // القطاع أو المجال التجاري للمشروع (مثال: الهدايا اليدوية، التجزئة، الخدمات)
            $table->string('industry', 100);

            // وصف تفصيلي للمنتجات أو الخدمات الأساسية التي يقدمها المشروع
            $table->text('products_services');

            // الرؤية والرسالة والقيم بصيغة JSON (اختياري)
            $table->json('vision_mission_values')->nullable();

            // الهوية البصرية (الألوان، الخطوط، الشعار) بصيغة JSON (اختياري)
            $table->json('visual_identity')->nullable();

            // شخصية العلامة التجارية (مثال: عصرية، دافئة، احترافية)
            $table->string('brand_personality', 100)->nullable();

            // نبرة الصوت في الخطاب التسويقي (مثال: ودود، رسمي، ملهم)
            $table->string('tone_of_voice', 100)->nullable();

            // اللغة أو اللهجة المفضلة في التوليد والتحليل (الافتراضي: MSA الفصحى؛ وقد تكون يمني، خليجي، مصري، شامي)
            $table->string('preferred_dialect', 50)->default('MSA');

            // الميزة التنافسية والقيمة الفريدة المقدمة للعميل (UVP)
            $table->text('uvp')->nullable();

            // الأهداف التجارية والتسويقية للمشروع بصيغة JSON
            $table->json('business_goals')->nullable();

            // ملاحظة: عمود dna_embedding (VECTOR) خاص بـ pgvector في PostgreSQL ومؤجل حالياً على MySQL

            // إنشاء عمودي created_at و updated_at تلقائياً لتتبع إنشاء وتحديث ملف العلامة التجارية
            $table->timestamps();
        });
    }

    /**
     * التراجع عن إنشاء الجدول وحذفه عند عمل rollback.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};

/*
 * =========================================================================
 * دليل نموذج (Model) جدول العلامات التجارية: App\Models\Brand
 * =========================================================================
 * - HasUuids: يُفعّل لتوليد وإدارة مفتاح id من نوع UUID تلقائياً في Eloquent.
 * - الحقول القابلة للتعبئة ($fillable):
 *     [
 *         'workspace_id',
 *         'name',
 *         'industry',
 *         'products_services',
 *         'vision_mission_values',
 *         'visual_identity',
 *         'brand_personality',
 *         'tone_of_voice',
 *         'preferred_dialect',
 *         'uvp',
 *         'business_goals',
 *     ]
 * - تحويل الأنواع ($casts):
 *     [
 *         'vision_mission_values' => 'array',
 *         'visual_identity'       => 'array',
 *         'business_goals'        => 'array',
 *     ]
 * - العلاقات المتوقعة داخل App\Models\Brand:
 *     1. workspace(): belongsTo(Workspace::class, 'workspace_id')
 *        -> يرجع مساحة العمل المالكة لهذا المشروع.
 *     2. audiencePersonas(): hasMany(AudiencePersona::class, 'brand_id')
 *        -> يرجع شرائح الجمهور وشخصيات العملاء المرتبطة بالمشروع.
 *     3. competitors(): hasMany(Competitor::class, 'brand_id')
 *        -> يرجع المنافسين المسجلين وتحليلاتهم للمشروع.
 *     4. marketInsights(): hasMany(MarketInsight::class, 'brand_id')
 *        -> يرجع اتجاهات السوق والفرص والمخاطر المرصودة للمشروع.
 */