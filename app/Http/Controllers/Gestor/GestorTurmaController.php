<?php

namespace App\Http\Controllers\Gestor;

use App\Models\Aluno;
use App\Models\Turma;
use App\Models\Materia;
use App\Models\Professor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Curso;

class GestorTurmaController extends Controller
{
    // Controller: TurmaController.php
    public function create()
    {
        // Recupera todas as matérias do banco
        $cursos = Curso::all();
        $materias = Materia::all();
        return view('gestao.adicionarTurma', compact('materias', 'cursos'));
    }
    public function store(Request $request)
    {
        // Valida os dados enviados
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:500',
            'materias' => 'required|array', // As matérias devem ser enviadas como array de IDs
            'materias.*' => 'exists:materias,id', // Garante que os IDs existem na tabela 'materias'
            'curso_id' => 'required|exists:cursos,id', // Certifica que o curso_id existe na tabela 'cursos'
        ]);
    
        // Cria a turma no banco
        $turma = Turma::create([
            'curso_id' => $validatedData['curso_id'],
            'nome' => $validatedData['nome'],
            'descricao' => $validatedData['descricao'],
        ]);
    
        // Associa matérias à turma
        $turma->materias()->sync($request->materias);
    
        return redirect()->route('gestao.adicionarTurmaview')->with('success', 'Turma cadastrada com sucesso!');
    }

    // Método para exibir o formulário de edição
    public function edit($id)
    {
        // Buscar a turma pelo ID
        $turma = Turma::findOrFail($id);

        // Buscar todas as matérias, alunos e professores
        $materias = Materia::all();
        $alunos = Aluno::all();
        $professores = Professor::all();

        // Passar as informações para a view
        return view('gestao.editarTurma', compact('turma', 'materias', 'alunos', 'professores'));
    }

    // Método para atualizar a turma
    public function update(Request $request, $id)
    {
        // Carrega a turma com as matérias
        $turma = Turma::with('materias')->findOrFail($id);

        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'professores' => 'array',
            'professores.*' => 'exists:professores,id', // Certifica que o professor existe
        ]);

        // Atualiza o nome e a descrição da turma
        $turma->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
        ]);

        // Associa os professores às matérias
        foreach ($turma->materias as $materia) {
            // Verifica se um professor foi selecionado para essa matéria
            if (isset($request->professores[$materia->id])) {
                $professorId = $request->professores[$materia->id];
                $materia->professores()->sync([$professorId]);  // Associa o professor à matéria
            }
        }

        // Associa os professores à turma na tabela intermediária 'professor_turma'
        if ($request->has('professores')) {
            $turma->professores()->sync($request->professores); // Sincroniza os professores com a turma
        }

        // Redirecionar com mensagem de sucesso
        return redirect()->route('gestao.editarTurmaview', $turma->id)->with('success', 'Turma atualizada com sucesso!');
    }
    // Método para listar todas as turmas
    public function index()
    {
        $turmas = Turma::all(); // Obtém todas as turmas
        return view('gestao.turmasIndex', compact('turmas')); // Passa as turmas para a view
    }
}
