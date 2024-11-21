<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (auth($guard)->check()) {
            // Redireciona o usuário autenticado para sua home correspondente
            switch ($guard) {
                case 'professor':
                    return redirect()->route('professor.home');
                case 'aluno':
                    return redirect()->route('aluno.home');
            }
        }

        return $next($request); // Continua para a rota solicitada se não estiver autenticado
    }
}
