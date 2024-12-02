<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('professor_materia', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->foreignId('professor_id')->constrained('professores')->onDelete('cascade'); // FK para professores
            $table->foreignId('materia_id')->constrained('materias')->onDelete('cascade'); // FK para matérias
            $table->timestamps(); // Created_at e Updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('professor_materia');
    }
};
