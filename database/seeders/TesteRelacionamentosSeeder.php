<?php

namespace Database\Seeders;

use App\Models\Professor;
use App\Models\Materia;
use App\Models\Turma;
use App\Models\Aluno;
use App\Models\TurmaMateria;
use App\Models\Presenca;
use App\Models\Tarefa;
use Illuminate\Database\Seeder;

class TesteRelacionamentosSeeder extends Seeder
{
    public function run()
    {
        // Criar Alunos
        $aluno1 = Aluno::create([
            'rm' => 12345,
            'codigo_etec' => 1001,
            'nome' => 'João Silva',
            'telefone' => '11912345678',
            'dt_nascimento' => '2005-06-15',
            'password' => bcrypt('aluno123'),
        ]);

        $aluno2 = Aluno::create([
            'rm' => 12346,
            'codigo_etec' => 1001,
            'nome' => 'Maria Oliveira',
            'telefone' => null,
            'dt_nascimento' => '2004-08-10',
            'password' => bcrypt('aluno123'),
        ]);

        // Criar Professores
        $professor1 = Professor::create([
            'rm' => 56789,
            'codigo_etec' => 1001,
            'nome' => 'Carlos Eduardo',
            'telefone' => '11998765432',
            'dt_nascimento' => '1980-05-20',
            'endereco' => 'Rua A, 123',
            'salario' => 3500.50,
            'password' => bcrypt('professor123'),
        ]);

        // Criar Matérias
        $materia1 = Materia::create([
            'nome' => 'Matemática Básica',
            'descricao' => 'Introdução aos conceitos fundamentais de Matemática',
        ]);

        $materia2 = Materia::create([
            'nome' => 'Física',
            'descricao' => 'Estudo dos conceitos básicos de Física',
        ]);

        // Criar Turmas
        $turma1 = Turma::create([
            'nome' => '1º Ano A',
            'descricao' => 'Turma do 1º Ano do Ensino Médio',
            'tipo' => 'Ensino médio',
        ]);

        $turma2 = Turma::create([
            'nome' => '2º Ano Técnico',
            'descricao' => 'Turma do 2º Ano do Curso Técnico',
            'tipo' => 'Curso Técnico',
        ]);

        // Relacionar Matérias e Turmas (Criando registros na tabela intermediária)
        $turmaMateria1 = TurmaMateria::create([
            'turma_id' => $turma1->id,
            'materia_id' => $materia1->id,
        ]);

        $turmaMateria2 = TurmaMateria::create([
            'turma_id' => $turma1->id,
            'materia_id' => $materia2->id,
        ]);

        $turmaMateria3 = TurmaMateria::create([
            'turma_id' => $turma2->id,
            'materia_id' => $materia2->id,
        ]);

        // Criar Tarefas
        Tarefa::create([
            'titulo' => 'Lista de Exercícios 1',
            'descricao' => 'Resolver os exercícios do capítulo 1',
            'data_entrega' => '2024-12-01',
            'professor_id' => $professor1->id,
            'turma_materia_id' => $turmaMateria1->id,
        ]);
        
        Tarefa::create([
            'titulo' => 'Experimento de Física',
            'descricao' => 'Realizar o experimento descrito no manual',
            'data_entrega' => '2024-12-05',
            'professor_id' => $professor1->id,
            'turma_materia_id' => $turmaMateria3->id,
        ]);

        // Criar Presenças
        Presenca::create([
            'aluno_id' => $aluno1->id,
            'turma_materia_id' => $turmaMateria1->id,  // Usando o relacionamento turma-materia
            'presente' => true,
        ]);

        Presenca::create([
            'aluno_id' => $aluno2->id,
            'turma_materia_id' => $turmaMateria3->id,  // Usando o relacionamento turma-materia
            'presente' => false,
        ]);
    }
}
