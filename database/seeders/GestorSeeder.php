<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gestor;

class GestorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Gestor::factory(5)->create(); // Cria 5 gestores
    }
}
