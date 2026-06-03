<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class SSOController extends Controller
{
    /**
     * Recibe el token, crea/encuentra al usuario localmente y crea una sesión local.
     */
    public function loginViaToken(Request $request)
    {
        $token = $request->query('token');

        if (!$token) {
            return redirect()->route('login');
        }

        try {
            // 1. Desciframos los datos del Hub
            $data = Crypt::decrypt($token);

            // 2. Validación de tiempo
            if (now()->timestamp - $data['time'] > 60) {
                return redirect()
                    ->route('login')
                    ->with('error', 'Token expirado');
            }

            // 3. LÓGICA DE CORRECCIÓN DE ROL SEGURA:
            $rolGlobal = strtolower($data['rol_global'] ?? ($data['rol'] ?? 'profesor'));
            $rolModulo = strtolower($data['rol_modulo'] ?? 'profesor');

            // El rol efectivo dentro de la aplicación lo marca el permiso del módulo
            $rolFinal = $rolModulo;

            // Si a nivel global llega como superadmin, aquí entra como admin
            if ($rolGlobal === 'superadmin') {
                $rolFinal = 'admin';
            }

            // Compatibilidad defensiva
            if ($rolFinal === 'superadmin') {
                $rolFinal = 'admin';
            } elseif ($rolFinal === 'alumno') {
                $rolFinal = 'profesor';
            }

            // Verificamos si el usuario ya existe para proteger su rol si ya es admin
            $userExistente = User::where('email', $data['email'])->first();
            if ($userExistente && $userExistente->rol === 'admin') {
                $rolFinal = 'admin';
            }

            // 4. Crear o actualizar usuario local
            $user = User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'nombre'   => $data['name'],
                    'rol'      => $rolFinal,
                    'password' => bcrypt(str()->random(16)),
                ]
            );

            // 5. Login LOCAL
            Auth::login($user);

            Log::info('LOGIN SSO OK', [
                'user_id' => Auth::id(),
                'rol'     => $user->rol,
            ]);

            // 6. REDIRECCIÓN DINÁMICA
            if (strtolower($user->rol) === 'admin') {
                return redirect()->route('admin.index');
            }

            return redirect()->route('asignaciones.vista');

        } catch (\Exception $e) {
            Log::error("Error SSO: " . $e->getMessage());

            return redirect()
                ->route('login')
                ->with('error', 'Error en la autenticación local.');
        }
    }
}