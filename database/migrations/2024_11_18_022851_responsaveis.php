<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('responsaveis', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->string('nome'); // Nome do responsável
            $table->string('email')->unique(); // Email
            $table->string('telefone')->nullable(); // Telefone
            $table->string('endereco')->nullable(); // Endereço
            $table->timestamps(); // Created_at e Updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('responsaveis');
    }
};
