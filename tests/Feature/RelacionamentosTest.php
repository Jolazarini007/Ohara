<?php

use Tests\TestCase;
use App\Models\Aluno;
use App\Models\Turma;
use App\Models\Tarefa;
use App\Models\Presenca;
use App\Models\Professor;
use App\Models\TurmaMateria;
use Illuminate\Foundation\Testing\RefreshDatabase;


class RelacionamentosTest extends TestCase
{
    use RefreshDatabase;

    public function testRelacionamentosEstaoFuncionandoCorretamente()
    {
        // Executar o Seeder
        $this->seed(\Database\Seeders\TesteRelacionamentosSeeder::class);

        // Verificar Alunos
        $aluno = Aluno::where('rm', 12345)->first();
        $this->assertNotNull($aluno);
        $this->assertEquals('João Silva', $aluno->nome);

        // Verificar Professor
        $professor = Professor::where('rm', 56789)->first();
        $this->assertNotNull($professor);
        $this->assertEquals('Carlos Eduardo', $professor->nome);

        // Verificar Relação Turma e Matéria
        $turma = Turma::where('nome', '1º Ano A')->first();
        $this->assertTrue($turma->materias->contains('nome', 'Matemática Básica'));
        $this->assertTrue($turma->materias->contains('nome', 'Física'));

        // Verificar Tarefas do Professor
        $tarefas = $professor->tarefas;
        $this->assertCount(2, $tarefas);
        $this->assertEquals('Lista de Exercícios 1', $tarefas[0]->titulo);

        // Exemplo de teste de presença
        $presenca = Presenca::where('aluno_id', 1)
                            ->where('turma_materia_id', TurmaMateria::where('turma_id', 1)->where('materia_id', 1)->first()->id)
                            ->first();
        $this->assertNotNull($presenca); // Confirma se a presença existe
    }
}