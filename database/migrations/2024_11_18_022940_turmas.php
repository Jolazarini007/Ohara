<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->string('nome'); // Nome da turma
            $table->string('descricao')->nullable(); // Descrição da turma
            $table->enum('tipo', ['Ensino médio', 'Curso Técnico']); // 'Ensino Médio' ou 'Curso Técnico'
            $table->timestamps(); // Created_at e Updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('turmas');
    }
};
