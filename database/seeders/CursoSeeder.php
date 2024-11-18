<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso;

class CursoSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Curso::factory(5)->create(); // Cria 5 cursos
    }
}
