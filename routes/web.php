<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecoleccionController;

Route::post('/registrar', [AuthController::class, 'registrarUsuario'])->name('registrar.usuario');
Route::post('/programar', [RecoleccionController::class, 'programar'])->name('programar.recoleccion');
Route::get('/historial', [RecoleccionController::class, 'historial'])->name('historial.recolecciones');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/registro', function () {
    return view('auth.register');
});

Route::get('/programar', function () {
    return view('programar');
})->middleware('auth');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware(['auth.custom'])->group(function () {
    Route::get('/programar', [RecoleccionController::class, 'showProgramarForm'])->name('programar.recoleccion');
    Route::post('/programar', [RecoleccionController::class, 'programar'])->name('programar.recoleccion');
});
