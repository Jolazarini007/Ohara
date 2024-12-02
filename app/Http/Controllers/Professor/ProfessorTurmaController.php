<?php

namespace App\Http\Controllers\Professor;

use App\Models\Turma;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfessorTurmaController extends Controller
{
    public function index($turmaId)
    {
        // Carregar a turma com os alunos associados
        $turma = Turma::with('alunos')->findOrFail($turmaId);

        return view('professor.turma', compact('turma'));
    }

    public function create($turmaId)
    {
        // Carregar a turma e as tarefas associadas
        $turma = Turma::with('tarefas')->findOrFail($turmaId);  // Removi o 'professor' de tarefas porque não é necessário aqui

        return view('professor.tarefas', [
            'turma' => $turma,
            'professorId' => Auth::guard('professor')->user()->id, // O ID do professor logado
            'tarefas' => $turma->tarefas, // Passar as tarefas associadas à turma
            'professor'=> Auth::guard('professor')->user(),
        ]);
    }

    public function store(Request $request, $turmaId)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data_entrega' => 'required|date',
            'materia' => 'required'
        ]);
        
        // Criação da tarefa com o ID da turma
        Tarefa::create([
            'titulo' => $validatedData['titulo'],
            'descricao' => $validatedData['descricao'],
            'data_entrega' => $validatedData['data_entrega'],
            'professor_id' => Auth::guard('professor')->user()->id, // ID do professor logado
            'turma_id' => $turmaId, // O ID da turma, passando diretamente para o modelo
            'materia_id' =>$validatedData['materia'],
        ]);
    
        return redirect()->route('professor.turma.tarefas.create', $turmaId)
            ->with('success', 'Tarefa criada com sucesso!');
    }
}

