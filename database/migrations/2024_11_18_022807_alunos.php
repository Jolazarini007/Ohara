<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->integer('rm')->unique(); // RM do aluno
            $table->integer('codigo_etec'); // Código da etec do aluno
            $table->string('nome'); // Nome do aluno
            $table->string('telefone')->nullable(); // Telefone
            $table->date('dt_nascimento'); // Data de nascimento
/*             $table->string('curso'); // Curso do aluno
            $table->string('modulo'); // Módulo do aluno
            $table->string('turma'); // Turma do aluno */
            $table->binary('foto')->nullable();
            $table->string('password'); // Senha do aluno
            $table->timestamps(); // Created_at e Updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('alunos');
    }
};