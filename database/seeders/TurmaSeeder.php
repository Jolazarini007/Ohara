<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Turma;

class TurmaSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Turma::factory(10)->create(); // Cria 10 turmas
    }
}
