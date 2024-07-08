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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subject_name', 100)->notnull;
            $table->string('subject_credits', 100)->notnull;
            $table->unsignedBigInteger('id_curriculum_semester');
            $table->unsignedBigInteger('id_area');
            $table->string('subject_code', 100)->notnull;
            $table->timestamps();
            $table->foreign('id_curriculum_semester')->references('id')->on('curriculum_semesters')->onDelete('cascade');
            $table->foreign('id_area')->references('id')->on('areas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
