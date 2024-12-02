<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->string('nome'); //->unique(); // Nome do curso
            $table->string('descricao')->nullable(); // Descrição do curso
            $table->enum('periodos', ['manha', 'tarde', 'noite'])->nullable(); // Períodos que o curso pode ter
            $table->integer('modulos')->nullable(); // Módulos que o curso pode ter
            $table->timestamps(); // Created_at e Updated_at
        });
        
        DB::statement('ALTER TABLE cursos MODIFY periodos JSON;');
    }

    public function down()
    {
        Schema::dropIfExists('cursos');
    }
};
