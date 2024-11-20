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
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('aluno.home', absolute: false));
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
