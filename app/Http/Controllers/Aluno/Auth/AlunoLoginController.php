<?php

namespace App\Http\Controllers\Aluno\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\AlunoLoginRequest;

class AlunoLoginController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('login.aluno');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(AlunoLoginRequest $request): RedirectResponse
    {
        // Captura as credenciais de login
        $credentials = $request->only('rm', 'codigo_etec', 'password');

        // Tenta autenticar usando o guard 'alunos'
        if (Auth::guard('aluno')->attempt($credentials, $request->boolean('remember'))) {
            // Regenera a sessão para evitar roubo de sessão
            $request->session()->regenerate();

            // Redireciona para a página inicial do aluno
            return redirect(route('aluno.home'));
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
        Auth::guard('aluno')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
