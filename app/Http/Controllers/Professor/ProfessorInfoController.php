<?php

namespace App\Http\Controllers\Professor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfessorInfoController extends Controller
{
/*     public function dados(){
        
        $aluno = Auth::guard('professor')->user();

        return view('professor.dadosAluno', ['aluno' => $aluno]);
    } */

    public function home(){
        $professor = Auth::guard('professor')->user();

        return view('professor.home', ['professor' => $professor]);

    }
}
