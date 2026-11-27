
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('brand_assets', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // العلامة التجارية المالكة للملف
            $table->foreignUuid('brand_id')
                ->constrained('brands')
                ->cascadeOnDelete();

            // القسم الوحيد الذي ينتمي إليه الملف
            $table->string('section_key', 50);

            // معلومات الملف
            $table->string('original_name');
            $table->string('file_path', 2048);
            $table->string('disk', 50)->default('public');
            $table->string('mime_type', 150);
            $table->unsignedBigInteger('file_size');

            // مصدر الملف
            $table->string('source', 30)->default('user');

            // الحالة المستقلة لاعتماد الملف كمرفق
            // pending | approved | rejected
            $table->string('asset_approval_status', 30)
                ->default('pending');

            // حالة معالجة الملف وتحليله
            // uploaded | processing | completed | failed
            $table->string('processing_status', 30)
                ->default('uploaded');

            // حالة مراجعة المعلومات المستخرجة
            // not_reviewed | in_review | partially_approved
            // approved | rejected
            $table->string('review_status', 30)
                ->default('not_reviewed');

            // نتائج تحليل الذكاء الاصطناعي
            // تظل اقتراحات حتى يراجعها المستخدم
            $table->json('analysis_data')->nullable();

            // بيانات إضافية
            $table->json('metadata')->nullable();

            $table->timestamps();

            $table->index(
                ['brand_id', 'section_key'],
                'brand_assets_section_index'
            );

            $table->index('asset_approval_status');
            $table->index('processing_status');
            $table->index('review_status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('brand_assets');
    }
};
