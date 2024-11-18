<?php

namespace Database\Factories;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Semestre>
 */
use App\Models\Semestre;
use Illuminate\Database\Eloquent\Factories\Factory;

class SemestreFactory extends Factory
{
    protected $model = Semestre::class;

    public function definition()
    {
        return [
            'periodo_id' => \App\Models\Periodo::factory(),
            'nome' => $this->faker->word,
            'descricao' => $this->faker->sentence,
        ];
    }
}