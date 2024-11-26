<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gestores', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->string('rg');
            $table->string('cpf');
            $table->integer('rm');
            $table->integer('codigo_etec'); // Código da etec do gestor
            $table->string('nome'); // Nome do gestor
            $table->string('telefone')->nullable(); // Telefone
            $table->date('dt_nascimento'); // Data de nascimento
            $table->string('endereco');
            $table->string('password')->nullable(); // Senha do gestor
            $table->binary('foto')->nullable();

            $table->timestamps(); // Created_at e Updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestores');
    }
};
