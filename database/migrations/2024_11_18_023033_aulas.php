<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('aulas', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->foreignId('aluno_turma_id')->constrained('aluno_turma')->onDelete('cascade'); // FK para aluno_turma
            $table->foreignId('professor_materia_id')->constrained('professor_materia')->onDelete('cascade'); // FK para professor_materia
            $table->string('conteudo'); // Conteúdo da aula
            $table->date('data'); // Data da aula
            $table->timestamps(); // Created_at e Updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('aulas');
    }
};
