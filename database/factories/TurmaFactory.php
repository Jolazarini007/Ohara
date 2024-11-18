<?php

namespace Database\Factories;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Turma>
 */
use App\Models\Turma;
use Illuminate\Database\Eloquent\Factories\Factory;

class TurmaFactory extends Factory
{
    protected $model = Turma::class;

    public function definition()
    {
        return [
            'curso_id' => \App\Models\Curso::factory(),
            'periodo_id' => \App\Models\Periodo::factory(),
            'nome' => $this->faker->word,
            'descricao' => $this->faker->sentence,
        ];
    }
}
