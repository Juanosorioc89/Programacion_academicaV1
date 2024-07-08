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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_faculty');
            $table->unsignedBigInteger('id_program_type');
            $table->string('name_program', 100)->notnull;
            $table->string('program_code', 100)->notnull;
            $table->timestamps();
            $table->foreign('id_faculty')->references('id')->on('faculties')->onDelete('cascade');
            $table->foreign('id_program_type')->references('id')->on('program_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
