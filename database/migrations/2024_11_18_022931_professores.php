<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('rg'); // Nome do professor
            $table->string('cpf'); // Nome do professor
            $table->decimal('salario', 8, 2)->nullable(); // Salário do professor
            $table->string('password')->nullable(); // Senha do professor
            $table->binary('foto')->nullable();

            $table->timestamps(); // Created_at e Updated_at
        });


        // Alterar a coluna "foto" para MEDIUMBLOB após a criação
        DB::statement('ALTER TABLE professores MODIFY COLUMN foto MEDIUMBLOB');
    }

    public function down()
    {
        Schema::dropIfExists('professores');
    }
};