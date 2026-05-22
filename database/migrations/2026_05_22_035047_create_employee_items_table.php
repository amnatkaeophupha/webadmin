<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee_items', function (Blueprint $table) {
            $table->id();

            // section ที่เอาไปแสดง
            $table->foreignId('employee_section_id')
                ->constrained('employee_sections')
                ->cascadeOnDelete();

            // บุคลากร
            $table->foreignId('employee_id')
                ->constrained('employees')
                ->cascadeOnDelete();

            // ตำแหน่งที่ใช้แสดงใน section นี้ (override ได้)
            $table->string('display_position_name')->nullable();
            $table->json('managed_departments')->nullable()->comment('หน่วยงานภายใต้กำกับดูแล (เฉพาะผู้บริหาร)');

            // ลำดับการแสดงผล
            $table->integer('sort_order')->default(0);

            // สถานะใช้งาน
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            // 🔥 ป้องกันข้อมูลซ้ำ (สำคัญ)
            $table->unique(['employee_section_id', 'employee_id']);

            // 🔥 เพิ่ม index สำหรับ performance
            $table->index(['employee_section_id', 'is_active', 'sort_order']);
            $table->index(['employee_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_items');
    }
};