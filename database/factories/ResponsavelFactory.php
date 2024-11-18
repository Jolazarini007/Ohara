<?php

namespace Database\Factories;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Responsavel>
 */
use App\Models\Responsavel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResponsavelFactory extends Factory
{
    protected $model = Responsavel::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'telefone' => $this->faker->phoneNumber,
            'endereco' => $this->faker->address,
        ];
    }
}