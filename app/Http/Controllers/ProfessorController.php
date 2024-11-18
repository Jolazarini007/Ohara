<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;
use Illuminate\Support\Facades\Auth;

class ProfessorController extends Controller
{
    public function showLoginProfessor()
    {
        return view('login.loginProfessor');
    }

    public function loginProfessor(Request $request)
    {
        // Validação
        $validated = $request->validate([
            'rm' => 'required|numeric',
            'codigo_etec' => 'required|string',
            'senha' => 'required|min:6',
        ]);
        
        // Buscar aluno no banco de dados
        $professor = Professor::where('rm', $request->rm)
            ->where('codigo_etec', $request->codigo_etec)
            ->first();
    
        if (!$professor) {
            return back()->withErrors(['login' => 'Professor não encontrado. Verifique as informações e tente novamente.']);
        }
    
        if (!password_verify($request->senha, $professor->senha)) {
            return back()->withErrors(['senha' => 'Senha incorreta.']);
        }
        // Autenticação manual
        Auth::login($professor);
    
        return redirect()->route('homeProfessor')->with('success', 'Login realizado com sucesso!');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // Mostrar home aluno
    public function showHomeProfessor(){
        return view('professor.homeProfessor');
    }
}
