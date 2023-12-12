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
        Schema::create('perguntas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categorias_id');
            $table->foreign('categorias_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->string('pergunta');
            $table->string('alternativa1');
            $table->string('alternativa2');
            $table->string('alternativa3');
            $table->string('alternativa4');
            $table->string('respostaCorreta');
            $table->integer('dificuldade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perguntas');
    }
};
