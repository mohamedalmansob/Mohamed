
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('brand_asset_extractions', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // الملف الذي استُخرجت منه المعلومة
            $table->foreignUuid('brand_asset_id')
                ->constrained('brand_assets')
                ->cascadeOnDelete();

            // الحقل الذي تنتمي إليه المعلومة
            $table->string('field_key', 100);

            // القيمة المقترحة من الذكاء الاصطناعي
            $table->json('proposed_value');

            // القيمة التي اعتمدها المستخدم بعد المراجعة
            $table->json('approved_value')->nullable();

            // قرار المستخدم: pending | approved | rejected
            $table->string('decision_status', 30)
                ->default('pending');

            // النص الأصلي الذي استُخرجت منه المعلومة
            $table->text('source_excerpt')->nullable();

            // مرجع موضع المعلومة داخل الملف
            $table->json('source_reference')->nullable();

            // تاريخ مراجعة المستخدم
            $table->timestamp('reviewed_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('brand_asset_extractions');
    }
};
