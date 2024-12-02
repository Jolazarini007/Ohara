<?php

namespace App\Http\Controllers\Professor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfessorInfoController extends Controller
{
     public function dados(){
        
        $professor = Auth::guard('professor')->user();

        return view('professor.dados', ['professor' => $professor]);
    } 

    public function home(){
        $professor = Auth::guard('professor')->user();

        return view('professor.home', ['professor' => $professor]);

    }
}
