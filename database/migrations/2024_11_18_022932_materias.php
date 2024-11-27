<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->string('nome'); // Nome da matéria
            $table->string('descricao')->nullable(); // Descrição da matéria
            $table->timestamps(); // Created_at e Updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('materias');
    }
};