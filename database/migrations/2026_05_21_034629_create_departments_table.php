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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            // หน่วยงานแม่ เช่น สำนักอธิการบดี
            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('departments')
                ->nullOnDelete();

            $table->string('name');
            $table->string('code')->nullable();
            $table->string('slug')->unique();

            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
