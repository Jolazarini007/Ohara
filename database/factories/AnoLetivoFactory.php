<?php

namespace Database\Factories;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnoLetivo>
 */
use App\Models\AnoLetivo;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnoLetivoFactory extends Factory
{
    protected $model = AnoLetivo::class;

    public function definition()
    {
        return [
            'periodo_id' => \App\Models\Periodo::factory(),
            'ano' => $this->faker->year,
            'descricao' => $this->faker->sentence,
        ];
    }
}
