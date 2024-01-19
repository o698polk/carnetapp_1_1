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
          Schema::create('shares', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('id_filedata')->unsigned()->notnull();
            $table->foreign('id_filedata')->references('id')->on('filedatas');

            $table->integer('id_customer')->unsigned()->notnull();
            $table->foreign('id_customer')->references('id')->on('usuarios');

            $table->integer('id_supplier')->unsigned()->notnull();
            $table->foreign('id_supplier')->references('id')->on('usuarios');

          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shares');
    }
};
