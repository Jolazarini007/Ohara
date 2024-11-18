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
            $table->string('nome'); // Nome do professor
            $table->string('telefone')->nullable(); // Telefone
            $table->string('area_ensino')->nullable(); // Área de ensino
            $table->date('dt_nascimento'); // Data de nascimento
            $table->date('dt_contratacao'); // Data de nascimento
            $table->string('endereco');
            $table->string('status');
            $table->string('senha')->nullable(); // Senha do professor
            $table->decimal('salario', 8, 2)->nullable(); // Nota da avaliação
            $table->timestamps(); // Created_at e Updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('professores');
    }
};
