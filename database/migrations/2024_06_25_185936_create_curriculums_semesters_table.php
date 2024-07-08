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
        Schema::create('curriculum_semesters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_curriculum');
            $table->string('semester_number', 100)->notnull;
            $table->timestamps();
            $table->foreign('id_curriculum')->references('id')->on('curriculums')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriculum_semesters');
    }
};
