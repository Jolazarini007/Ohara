<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Aluno;
use Illuminate\Support\Facades\Log;

class LoginAlunoController extends Controller
{
    public function showLoginAluno()
    {
        return view('login.loginAluno');
    }

    public function loginAluno(Request $request)
    {
        Log::info('Entrando no método loginAluno');
        Log::info('Dados recebidos: ', $request->all());
        // Validação
        $validated = $request->validate([
            'rm' => 'required|numeric',
            'codigo_etec' => 'required|string',
            'senha' => 'required|min:6',
        ]);
    
        // Debug: Mostra os dados enviados
        logger()->info('Tentativa de login com os dados:', $validated);
    
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
        logger()->info('Login bem-sucedido:', ['aluno_id' => $aluno->id]);
    
        return redirect()->route('homeAluno')->with('success', 'Login realizado com sucesso!');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
