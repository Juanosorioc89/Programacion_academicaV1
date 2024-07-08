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
        Schema::create('semester_subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_subject');
            $table->unsignedBigInteger('id_block');
            $table->unsignedBigInteger('students_number');
            $table->timestamps();
            $table->foreign('id_subject')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('id_block')->references('id')->on('blocks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semester_subjects');
    }
};
