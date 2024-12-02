<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->integer('rm')->unique(); // RM do aluno
            $table->integer('codigo_etec'); // Código da etec do aluno
            $table->string('nome'); // Nome do aluno
            $table->string('rg'); // Nome do aluno
            $table->string('cpf'); // Nome do aluno
            $table->string('endereco'); // Nome do aluno
            $table->string('telefone')->nullable(); // Telefone
            $table->date('dt_nascimento'); // Data de nascimento
            $table->binary('foto')->nullable();
            $table->string('password'); // Senha do aluno
            $table->timestamps(); // Created_at e Updated_at
        });

        // Alterar a coluna "foto" para MEDIUMBLOB após a criação
        DB::statement('ALTER TABLE alunos MODIFY COLUMN foto MEDIUMBLOB');
    }

    public function down()
    {
        Schema::dropIfExists('alunos');
    }
};