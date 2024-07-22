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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_code', 100)->notnull;
            $table->unsignedBigInteger('id_semester_subject');
            $table->unsignedBigInteger('id_teacher');
            $table->timestamps();
            $table->foreign('id_semester_subject')->references('id')->on('semester_subjects')->onDelete('cascade');
            $table->foreign('id_teacher')->references('id')->on('teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
