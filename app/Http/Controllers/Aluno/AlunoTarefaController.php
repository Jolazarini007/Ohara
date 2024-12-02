<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AlunoTarefaController extends Controller
{
    public function tarefas(){
        
            // Obtém todas as tarefas de todas as turmas associadas ao aluno autenticado
    $tarefas = Auth::guard('aluno')->user()->turmas->flatMap(function ($turma) {
        return $turma->tarefas;
    });

        return view('aluno.atividades', ['tarefas' => $tarefas]);
    }


}
