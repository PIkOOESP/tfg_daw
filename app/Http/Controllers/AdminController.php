<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Muestra el panel principal de administración.
     */
    public function index()
    {
        // 1. Verificación de seguridad:
        // Solo permitimos el acceso si el rol es exactamente 'admin'
        if (Auth::check() && Auth::user()->rol === 'admin') {
            return view('admin.adminIndex');
        }

        // 2. Si no es admin, bloqueamos el acceso
        abort(403, 'Acceso denegado: No tienes permisos de administrador.');
    }
}