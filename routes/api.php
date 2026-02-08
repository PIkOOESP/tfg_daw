<?php

use App\Http\Controllers\ClaseAlumnoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rutas para visualizar las clases
Route::post('/clase/filtrar', [ClaseAlumnoController::class, 'filtrar'])->name('claseAlumno.filtrar');
Route::get("/clase", [ClaseAlumnoController::class, "vista"])->name('claseAlumno.vista');

// Rutas para crear una clase
Route::post("/clase/crear/mostrar",[ClaseAlumnoController::class, "mostrarCrearEditar"])->name('claseAlumno.mostrar');
Route::post("/clase/crear/request", [ClaseAlumnoController::class, "crear"])->name('claseAlumno.crear');
Route::get("/clase/crear", [ClaseAlumnoController::class, "vistaCrear"])->name('claseAlumno.vistaCrear');

//Rutas para editar una clase
Route::post("/clase/editar/request", [ClaseAlumnoController::class, "editar"])->name('claseAlumno.editar');