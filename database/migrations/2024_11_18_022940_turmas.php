<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->string('nome'); // Nome da turma
            $table->string('descricao')->nullable(); // Descrição da turma
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade'); // Relacionamento com cursos            
            $table->timestamps(); // Created_at e Updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('turmas');
    }
};
