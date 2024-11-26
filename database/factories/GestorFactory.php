<?php

namespace Database\Factories;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gestor>
 */
use App\Models\Gestor;
use Illuminate\Database\Eloquent\Factories\Factory;

class GestorFactory extends Factory
{

    protected $model = Gestor::class;

    public function definition(): array
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
        'rg' =>$this->faker->unique()->numerify('#########'), // 9 dígitos aleatórios para CPF
        'cpf' => $this->faker->unique()->numerify('###########'), // 11 dígitos aleatórios para CPF        
        'nome' => $this->faker->name,
        'telefone' => $this->faker->phoneNumber,
        'dt_nascimento'=> $this->faker->date('Y-m-d', '2010-01-01'),
        'endereco' => $this->faker->address,
        'password' => bcrypt('gestor123'),
        'foto' => $imageBlob,
        ];
    }
}
