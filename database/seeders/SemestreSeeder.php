<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Semestre;

class SemestreSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Semestre::factory(2)->create(); // Cria 2 semestres
    }
}