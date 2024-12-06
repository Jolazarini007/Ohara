<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AlunoInfoController extends Controller
{
    public function dados(){
        
        $aluno = Auth::guard('aluno')->user();

        return view('aluno.dadosAluno', ['aluno' => $aluno]);
    }

    public function home(){
        $tarefas = Auth::guard('aluno')->user()->turmas->flatMap(function ($turma) {
            return $turma->tarefas;
        });
        $aluno = Auth::guard('aluno')->user();

        return view('aluno.home', ['aluno' => $aluno, 'tarefas' => $tarefas]);

    }

}
