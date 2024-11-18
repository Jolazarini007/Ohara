<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Periodo;

class PeriodoSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Periodo::factory(3)->create(); // Cria 3 períodos
    }
}
