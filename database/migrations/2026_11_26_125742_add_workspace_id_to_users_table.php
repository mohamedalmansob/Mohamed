<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * إضافة عمود workspace_id لربط المستخدم بمساحة عمل واحدة فقط (علاقة 1:N مع workspaces).
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // معرّف مساحة العمل (UUID)؛ nullable للسماح بوجود مستخدم قبل التعيين، وnullOnDelete لحفظ حساب المستخدم عند حذف المساحة
            $table->foreignUuid('workspace_id')
                ->nullable()
                ->after('id')
                ->constrained('workspaces')
                ->nullOnDelete();
        });
    }

    /**
     * التراجع عن إضافة العمود وحذف القيد الأجنبي عند عمل rollback.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // حذف المفتاح الأجنبي أولاً ثم حذف العمود لتفادي أخطاء MySQL
            $table->dropForeign(['workspace_id']);
            $table->dropColumn('workspace_id');
        });
    }
};

/*
 * =========================================================================
 * دليل نموذج المستخدم: App\Models\User
 * =========================================================================
 * - أضف 'workspace_id' إلى $fillable ليُسمح بإسناده عند الإنشاء أو التحديث.
 * - العلاقة مع مساحة العمل (المستخدم يتبع لمساحة عمل واحدة فقط):
 *     public function workspace()
 *     {
 *         return $this->belongsTo(Workspace::class, 'workspace_id');
 *     }
 */