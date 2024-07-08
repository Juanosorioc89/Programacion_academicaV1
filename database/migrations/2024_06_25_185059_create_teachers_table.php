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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->notnull;
            $table->string('last_name', 100)->notnull;
            $table->string('document_type', 100)->notnull;
            $table->string('id_number', 100)->notnull;
            $table->string('personal_email', 100)->notnull;
            $table->string('institutional_email', 100)->notnull;
            $table->string('adress', 100)->notnull;
            $table->string('phone number', 100)->notnull;
            $table->string('number_mobile', 100)->notnull;
            $table->boolean('diplom', 100)->notnull;
            $table->unsignedBigInteger('id_vinculation_type');
            $table->timestamps();
            $table->foreign('id_vinculation_type')->references('id')->on('vinculation_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
