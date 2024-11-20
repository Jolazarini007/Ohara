<?php

namespace Database\Factories;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Professor>
 */
use App\Models\Professor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfessorFactory extends Factory
{
    protected $model = Professor::class;

    public function definition()
    {
        return [
            'rm'  => $this->faker->unique()->randomNumber(6, true), // RM com 6 dígitos
            'nome' => $this->faker->name,
            'telefone' => $this->faker->phoneNumber,
            'area_ensino' => $this->faker->word,
            'dt_nascimento' => $this->faker->date('Y-m-d', '2010-01-01'),
            'dt_contratacao' => $this->faker->date('Y-m-d', '2010-01-01'),
            'endereco' => $this->faker->address,
            'status' => $this->faker->word,
            'salario' => $this->faker->randomFloat(2, 1000, 5000),
            'codigo_etec' => $this->faker->unique()->randomNumber(6, true), // Código Etec com 10 caracteres aleatórios
            'password' => bcrypt('professor123'), // Senha padrão criptografada
        ];
    }
}