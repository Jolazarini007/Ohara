<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ResponsavelSeeder::class,
            /* AlunoSeeder::class, */
            CursoSeeder::class,
            ProfessorSeeder::class,
            /* MateriaSeeder::class, */
            PeriodoSeeder::class,
            TurmaSeeder::class,
            SemestreSeeder::class,
            AnoLetivoSeeder::class,
            GestorSeeder::class,
            /* TesteRelacionamentosSeeder::class, */
        ]);
    }
}
