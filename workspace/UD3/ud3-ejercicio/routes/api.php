<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\AsignaturaController;


Route::apiResource('alumnos', AlumnoController::class);
Route::apiResource('notas', NotaController::class);
Route::apiResource('asignaturas', AsignaturaController::class);
Route::get('/test', function () {
    return 'API funcionando correctamente.';
});
