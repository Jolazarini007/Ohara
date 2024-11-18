<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AnoLetivo;

class AnoLetivoSeeder extends Seeder
{
    public function run()
    {
        \App\Models\AnoLetivo::factory(1)->create(); // Cria 1 ano letivo
    }
}
