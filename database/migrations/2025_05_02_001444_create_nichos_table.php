<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
    * Ejecuta las migraciones.
     */
    public function up()
    {
        Schema::create('nichos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('ubicacion');
            $table->string('estado')->default('disponible'); // disponible / ocupado
            $table->timestamps();
        });
    }


    /**
    * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('nichos');
    }
};
