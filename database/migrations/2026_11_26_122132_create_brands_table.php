
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // ملف علامة تجارية واحد لكل مساحة عمل
            $table->foreignUuid('workspace_id')
                ->unique()
                ->constrained('workspaces')
                ->cascadeOnDelete();

            // بيانات الأقسام السبعة الحالية، بما فيها مدخلات المستخدم ومقترحات AI
            $table->json('profile_data')->nullable();

            // آخر القيم المعتمدة لكل قسم
            $table->json('approved_profile')->nullable();

            // حالة كل قسم بصورة مستقلة
            $table->json('section_status')->nullable();

            // رقم الإصدار العام، يبدأ من صفر
            $table->unsignedInteger('profile_version')->default(0);

            // تاريخ آخر اعتماد لأي قسم
            $table->timestamp('approved_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
