<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Responsavel;

class ResponsavelSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Responsavel::factory(10)->create(); // Cria 10 responsáveis
    }
}
