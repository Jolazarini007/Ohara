<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Materia;

class MateriaSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Materia::factory(10)->create(); // Cria 10 matérias
    }
}