<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AsignacionesOrdenadorController;
use App\Http\Controllers\IncidenciasController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\SSOController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Agrupamos todo en 'web' para asegurar que la gestión de sesiones (cookies) esté activa
Route::middleware(['web'])->group(function () {

    // --- RUTA PÚBLICA: Entrada SSO ---
    Route::get('/auth/sso', [SSOController::class, 'loginViaToken']);

    // --- RUTA PÚBLICA: Login de respaldo ---
    Route::get('/login', function () {
        return redirect()->away('http://localhost:8000');
    })->name('login');

    // --- RUTAS PROTEGIDAS CON MIDDLEWARE PERSONALIZADO ---
    // Usamos 'sso.auth' en lugar de 'auth' para evitar bucles de redirección nativos
    Route::middleware(['sso.auth'])->group(function () {

        Route::get('/', function () {
            return redirect()->route('asignaciones.vista');
        });


        // Rutas para visualizar las clases
        Route::get('/asignaciones/filtrar', [AsignacionesOrdenadorController::class, 'filtrar'])->name('asignaciones.filtrar');
        Route::get("/asignaciones", [AsignacionesOrdenadorController::class, "vista"])->name('asignaciones.vista');

        // Rutas para acciones (mini crear/borrar)
        Route::post("/asignaciones/crear", [AsignacionesOrdenadorController::class, 'miniCrear'])->name("asignaciones.miniCrear");
        Route::post("/asignaciones/borrar", [AsignacionesOrdenadorController::class, 'miniBorrar'])->name('asignaciones.borrar');

        // Historial
        Route::post('/asignaciones/historial', [HistorialController::class, 'historico'])->name('asignaciones.historial');

        // Incidencias
        Route::get('/incidencias', [IncidenciasController::class, 'home'])->name('incidencias.home');
        Route::post('/incidencias', [IncidenciasController::class, 'create'])->name('incidencias.create');

        // Admin Index
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

        // Admin Incidencias
        Route::get('/admin/incidencias', [IncidenciasController::class, 'homeAdmin'])->name('admin.incidencias');
        Route::get('/admin/incidencias/{incidencia_id}', [IncidenciasController::class, 'cambiarEstado'])->name('admin.incidencias.cambiar');

        // Historial Admin
        Route::get('/admin/historial', [HistorialController::class, 'home'])->name('admin.historial');

        // Ruta de cierre de sesión global
        Route::post('/logout', function(Request $request) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->away('http://localhost:8000/logout-total');
        })->name('logout');
    });
});