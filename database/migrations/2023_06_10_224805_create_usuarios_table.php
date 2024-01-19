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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_apellido');
            $table->string('correo')->unique();
            $table->string('clave');
            $table->string('dni')->nullable()->unique();
            $table->string('state')->notnull();
            $table->string('imgprofile')->nullable();
            $table->string('usuario');
            $table->string('code_verifi')->nullable();
            $table->string('st_verifi')->nullable();
            $table->string('blotype')->nullable();
            $table->string('level')->nullable();
            $table->string('course')->nullable();
            $table->string('occupation')->nullable();
            $table->string('department')->nullable();
            $table->string('rol');
            $table->string('genero')->nullable();
            $table->string('typecrd')->nullable();
            $table->integer('id_failed_jobs')->unsigned()->nullable();
            $table->foreign('id_failed_jobs')->references('id')->on('failed_jobs');
            $table->timestamps();
        });
        // Definir el inicio del autoincremento para el campo id en la tabla usuarios
        DB::statement("ALTER TABLE usuarios AUTO_INCREMENT = 873968294;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
