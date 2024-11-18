<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aluno;
use Illuminate\Support\Facades\Auth;

class AlunoController extends Controller
{
    public function showLoginAluno()
    {
        return view('login.loginAluno');
    }

    public function loginAluno(Request $request)
    {
        // Validação
        $validated = $request->validate([
            'rm' => 'required|numeric',
            'codigo_etec' => 'required|string',
            'senha' => 'required|min:6',
        ]);
        
        // Buscar aluno no banco de dados
        $aluno = Aluno::where('rm', $request->rm)
            ->where('codigo_etec', $request->codigo_etec)
            ->first();
    
        if (!$aluno) {
            return back()->withErrors(['login' => 'Aluno não encontrado. Verifique as informações e tente novamente.']);
        }
    
        if (!password_verify($request->senha, $aluno->senha)) {
            return back()->withErrors(['senha' => 'Senha incorreta.']);
        }
        // Autenticação manual
        Auth::login($aluno);
    
        return redirect()->route('homeAluno')->with('success', 'Login realizado com sucesso!');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // Mostrar home aluno
    public function showHomeAluno(){
        return view('aluno.homeAluno');
    }
}
