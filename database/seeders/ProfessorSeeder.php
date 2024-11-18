<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Professor;

class ProfessorSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Professor::factory(5)->create(); // Cria 5 professores
    }
}