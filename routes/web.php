<?php

use App\Http\Controllers\AsignacionesOrdenadorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()-> route('asignaciones.vista');
});

// Rutas para visualizar las clases
Route::get('/asignaciones/filtrar', [AsignacionesOrdenadorController::class, 'filtrar'])->name('asignaciones.filtrar');
Route::get("/asignaciones", [AsignacionesOrdenadorController::class, "vista"])->name('asignaciones.vista');

// Rutas para mini crear
Route::post("/asignaciones", [AsignacionesOrdenadorController::class, 'miniCrear'])->name("asignaciones.miniCrear");

// Rutas para mini borrar
Route::post("/asignaciones", [AsignacionesOrdenadorController::class, 'miniBorrar'])->name('asignaciones.miniBorrar');

// Ruta para añadir al historial
Route::post('/asignaciones/historial', [AsignacionesOrdenadorController::class, 'historico'])->name('asignaciones.historial');
