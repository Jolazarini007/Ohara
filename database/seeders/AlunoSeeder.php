<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aluno;

class AlunoSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Aluno::factory(20)->create(); // Cria 20 alunos
    }
}
