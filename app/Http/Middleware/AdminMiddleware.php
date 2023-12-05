<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Comprueba que el usuario sea administrador. Campo true en la bbdd.
        if ($request->user() && $request->user()->ADMIN) {
            return $next($request);
        }

        abort(403, 'Acceso no autorizado.');
    }
}

