<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->foreignId('aluno_turma_id')->constrained('aluno_turma')->onDelete('cascade'); // FK para aluno_turma
            $table->foreignId('professor_materia_id')->constrained('professor_materia')->onDelete('cascade'); // FK para professor_materia
            $table->string('tipo'); // Tipo da avaliação (ex: prova, trabalho)
            $table->decimal('nota', 5, 2)->nullable(); // Nota da avaliação
            $table->date('data'); // Data da avaliação
            $table->timestamps(); // Created_at e Updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('avaliacoes');
    }
};
