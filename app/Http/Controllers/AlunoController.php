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
            'password' => 'required|min:6',
        ]);
        
        // Buscar aluno no banco de dados
        $aluno = Aluno::where('rm', $request->rm)
            ->where('codigo_etec', $request->codigo_etec)
            ->first();
    
        if (!$aluno) {
            return response()->json(['error' => 'Aluno não encontrado. Verifique as informações e tente novamente.'], 404);
        }
    
        if (!password_verify($request->password, $aluno->password)) {
            return response()->json(['error' => 'Senha incorreta.'], 401);
        }
    
        // Autenticação manual
        Auth::login($aluno);
        
        // Retorna o aluno em formato JSON
        return response()->json([
            'message' => 'Login realizado com sucesso!',
            'aluno' => $aluno
        ], 200);
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
