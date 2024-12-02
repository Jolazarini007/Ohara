<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('responsavel_aluno', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->foreignId('responsavel_id')->constrained('responsaveis')->onDelete('cascade'); // FK para responsáveis
            $table->foreignId('aluno_id')->constrained('alunos')->onDelete('cascade'); // FK para alunos
            $table->timestamps(); // Created_at e Updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('responsavel_aluno');
    }
};
