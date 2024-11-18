<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('aluno_turma', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->foreignId('aluno_id')->constrained('alunos')->onDelete('cascade'); // FK para alunos
            $table->foreignId('turma_id')->constrained('turmas')->onDelete('cascade'); // FK para turmas
            $table->timestamps(); // Created_at e Updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('aluno_turma');
    }
};
