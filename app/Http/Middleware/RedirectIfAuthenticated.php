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
     * @param  string|null  $excludedGuard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $excludedGuard = null)
    {
        // Lista dos guards disponíveis no sistema
        $guards = ['professor', 'aluno', 'gestor'];

        foreach ($guards as $guard) {
            // Ignora o guard especificado como excluído
            if ($guard === $excludedGuard) {
                continue;
            }

            // Verifica se o usuário está autenticado nesse guard
            if (auth($guard)->check()) {
                // Redireciona o usuário autenticado para sua home correspondente
                switch ($guard) {
                    case 'professor':
                        return redirect()->route('professor.home');
                    case 'aluno':
                        return redirect()->route('aluno.home');
                    case 'gestor':
                        return redirect()->route('gestao.home');
                }
            }
        }

        // Continua para a rota solicitada se nenhum guard estiver autenticado
        return $next($request);
    }
}