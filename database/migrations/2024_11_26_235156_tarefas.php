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
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descricao');
            $table->date('data_entrega');
            $table->foreignId('turma_materia_id')->constrained('turma_materia')->onDelete('cascade');
            $table->foreignId('professor_id')->constrained('professores')->onDelete('cascade'); // Conexão com professor            $table->timestamps();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};