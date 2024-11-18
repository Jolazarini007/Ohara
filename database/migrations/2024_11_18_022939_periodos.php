<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('periodos', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->string('nome'); // Nome do período (ex: manhã, tarde, noite)
            $table->string('descricao'); // Descrição do período
            $table->timestamps(); // Created_at e Updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('periodos');
    }
};
