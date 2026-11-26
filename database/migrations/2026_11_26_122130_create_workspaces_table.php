<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * إنشاء جدول مساحات العمل (workspaces) بالحقول المطلوبة فقط: رقم المساحة، اسم المساحة، وتاريخ الإنشاء.
     */
    public function up(): void
    {
        Schema::create('workspaces', function (Blueprint $table) {
            // رقم / معرّف المساحة الفريد بصيغة UUID بدلاً من الأرقام المتسلسلة
            $table->uuid('id')->primary();

            // اسم مساحة العمل أو الفريق
            $table->string('name', 150);

            // تاريخ الإنشاء فقط (بدون updated_at) ويُسند تلقائياً عند إدراج السجل
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * التراجع عن إنشاء الجدول وحذفه عند عمل rollback.
     */
    public function down(): void
    {
        Schema::dropIfExists('workspaces');
    }
};

/*
 * =========================================================================
 * دليل نموذج (Model) جدول مساحات العمل: App\Models\Workspace
 * =========================================================================
 * - HasUuids: يُفعّل لإدارة مفتاح id من نوع UUID تلقائياً في Eloquent.
 * - تعطيل updated_at لأن الجدول يحتوي على created_at فقط:
 *     public const UPDATED_AT = null;
 * - الحقول القابلة للتعبئة ($fillable):
 *     ['name']
 * - تحويل الأنواع ($casts):
 *     ['created_at' => 'datetime']
 * - العلاقات المتوقعة داخل App\Models\Workspace:
 *     1. users(): hasMany(User::class, 'workspace_id')
 *        -> يرجع المستخدمين التابعين لمساحة العمل.
 *     2. brands(): hasMany(Brand::class, 'workspace_id') (أو hasOne إذا كانت علاقة 1:1)
 *        -> يرجع العلامات التجارية التابعة لمساحة العمل.
 */