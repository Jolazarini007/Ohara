<?php

namespace App\Http\Controllers\Professor\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\ProfessorLoginRequest;

class ProfessorLoginController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('login.professor');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(ProfessorLoginRequest $request): RedirectResponse
    {

        // Captura as credenciais de login
        $credentials = $request->only('rm', 'codigo_etec', 'password');
        
        // Tenta autenticar usando o guard 'alunos'
        if (Auth::guard('professor')->attempt($credentials, $request->boolean('remember'))) {
            // Regenera a sessão para evitar roubo de sessão
            $request->session()->regenerate();

            // Redireciona para a página inicial do aluno
            return redirect(route('professor.home'));
        }

        // Retorna erro se as credenciais forem inválidas
        return back()->withErrors([
            'rm' => __('auth.failed'),
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('professor')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
