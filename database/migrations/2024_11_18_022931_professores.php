<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('professores', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->integer('rm');
            $table->integer('codigo_etec'); // Código da etec do professor
            $table->string('nome'); // Nome do professor
            $table->string('telefone')->nullable(); // Telefone
            $table->date('dt_nascimento'); // Data de nascimento
            $table->string('endereco');
            $table->decimal('salario', 8, 2)->nullable(); // Salário do professor
            $table->string('password')->nullable(); // Senha do professor
            $table->binary('foto')->nullable();

            $table->timestamps(); // Created_at e Updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('professores');
    }
};