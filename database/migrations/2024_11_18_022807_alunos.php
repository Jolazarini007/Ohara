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
            $table->string('nome'); // Nome do aluno
            $table->integer('codigo_etec'); // Código da etec do aluno
            $table->date('dt_nascimento'); // Data de nascimento
            $table->string('telefone')->nullable(); // Telefone
            $table->string('password'); // Senha do aluno
            $table->timestamps(); // Created_at e Updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('alunos');
    }
};
