<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('semestres', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->string('nome'); // Nome do semestre (ex: 1º Semestre, 2º Semestre)
            $table->string('descricao'); // Descrição do semestre
            $table->foreignId('periodo_id')->constrained('periodos')->onDelete('cascade'); // FK para periodos
            $table->timestamps(); // Created_at e Updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('semestres');
    }
};
