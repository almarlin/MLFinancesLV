<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRequestMethod
{
    public function handle(Request $request, Closure $next, ...$methods)
    {
        if (!in_array(strtoupper($request->method()), $methods)) {
            return response()->json(['error' => 'Acceso no autorizado.'], 403);
        }

        return $next($request);
    }
}
