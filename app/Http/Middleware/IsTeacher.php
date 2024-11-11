<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsTeacher
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está autenticado
        if (!Auth::check()) {
            return redirect('/login'); // Redireciona para login se não autenticado
        }

        // Verifica se o ID do usuário é 1 (definido como professor)
        // Se precisar de mais professores, considere uma verificação mais robusta,
        // como um campo de "papel" ou "tipo de usuário" no banco de dados
        if (Auth::id() !== 1) {
            abort(403, 'Acesso negado'); // Somente o professor pode acessar
        }

        return $next($request);
    }
}
