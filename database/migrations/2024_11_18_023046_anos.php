<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('anos_letivos', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->string('ano'); // Ano letivo (ex: 2024, 2025)
            $table->string('descricao'); // Descrição do ano letivo
            $table->foreignId('periodo_id')->constrained('periodos')->onDelete('cascade'); // FK para periodos
            $table->timestamps(); // Created_at e Updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('anos_letivos');
    }
};
