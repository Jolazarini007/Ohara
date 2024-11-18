<?php

namespace Database\Factories;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aluno>
 */
use App\Models\Aluno;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AlunoFactory extends Factory
{
    protected $model = Aluno::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'telefone' => $this->faker->phoneNumber(),
            'rm' => $this->faker->unique()->randomNumber(6, true), // RM com 6 dígitos
            'codigo_etec' => $this->faker->unique()->randomNumber(6, true), // Código Etec com 10 caracteres aleatórios
            'dt_nascimento' => $this->faker->date('Y-m-d', '2010-01-01'),
            'senha' => bcrypt('aluno'), // Senha padrão criptografada
            'matricula' => $this->faker->unique()->randomNumber(5),
        ];
    }
}
