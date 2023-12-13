<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class onlyUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Comprueba que el usuario sea administrador. Campo true en la bbdd.
        if ($request->user() && $request->user()->ADMIN==0) {
            return $next($request);
        }
        abort(403, 'Acceso no autorizado. Solo para usuarios.');
    }
}
