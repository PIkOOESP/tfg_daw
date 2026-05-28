<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureSSOAuthenticated
{
    public function handle(Request $request, Closure $next)
{
    // Si el usuario está autenticado O es la ruta de entrada del SSO, déjalo pasar.
    if (Auth::check() || $request->is('auth/sso')) {
        return $next($request);
    }

    // Si no, lo mandamos al Hub
    return redirect()->away('https://happs.cgarcher.dev');
}
}