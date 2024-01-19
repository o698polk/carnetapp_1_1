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
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_institution');
            $table->string('correo_institution')->unique();
            $table->string('dni_institution')->nullable()->unique();
            $table->string('state_institution')->notnull();
            $table->string('img_logo')->nullable();
            $table->string('web_institution');
            $table->string('bgk_institution_m')->nullable();
            $table->string('bgk_institution_f')->nullable();
            $table->string('representative_inst')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('failed_jobs');
    }
};
