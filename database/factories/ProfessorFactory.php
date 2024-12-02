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
         // Caminho para a imagem fixa
         $defaultImagePath = public_path('images/default.jpg');

         // Certifique-se de que o arquivo existe
         if (!file_exists($defaultImagePath)) {
             throw new \Exception('Imagem padrão não encontrada em: ' . $defaultImagePath);
         }
         $imageBlob = file_get_contents($defaultImagePath);
        
         // Leia o conteúdo binário da imagem
        return [
            'rm'  => $this->faker->unique()->randomNumber(6, true), // RM com 6 dígitos
            'codigo_etec' => $this->faker->unique()->randomNumber(6, true), // Código Etec com 10 caracteres aleatórios
            'nome' => $this->faker->name,
            'rg' => $this->faker->word,
            'cpf' => $this->faker->word,
            'telefone' => $this->faker->phoneNumber,
            'dt_nascimento' => $this->faker->date('Y-m-d', '2010-01-01'),
            'endereco' => $this->faker->address,
            'salario' => $this->faker->randomFloat(2, 1000, 5000),
            'foto' => $imageBlob,
            'password' => bcrypt('professor123'), // Senha padrão criptografada
        ];
    }
}