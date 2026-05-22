<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureSSOAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        // Si el usuario ya está autenticado, pasa sin problemas
        if (Auth::check()) {
            return $next($request);
        }

        // Si NO está autenticado, lo mandamos al Hub, no a una ruta interna
        return redirect()->away('http://localhost:8000');
    }
}