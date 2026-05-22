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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->foreignId('home_department_id')
                ->nullable()
                ->constrained('departments')
                ->nullOnDelete();

            // 🇹🇭 ชื่อภาษาไทย (หลัก)
            $table->string('prefix_name_th')->nullable();
            $table->string('first_name_th');
            $table->string('last_name_th');

            $table->enum('type', ['academic', 'support'])->default('academic');

            // ข้อมูลทั่วไป
            $table->string('position_name')->nullable();

            $table->string('internal_phone')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('line_id')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('image')->nullable();

            // สำหรับเรียงลำดับหน้าเว็บ
            $table->integer('sort_order')->default(0);

            // สถานะใช้งาน
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};