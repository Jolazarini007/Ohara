<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomAuthenticate
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
        if (!auth($guard)->check()) {
            // Redireciona para uma página de login personalizada
            $route = match ($guard) {
                'professor' => route('professor.login'),
                'aluno' => route('aluno.login'),
                'gestor' => route('gestao.login'),
                default => route('login'), // Página geral de login
            };

            return redirect($route)->with('error', 'Você precisa estar autenticado para acessar essa página.');
        }

        return $next($request); // Permite acesso se autenticado
    }
}
