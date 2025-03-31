<?php

use App\Infrastructure\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

// Agrupamos todas las rutas que comienzan con el prefijo '/auth'
Route::prefix('auth')->group(function () {
    Route::post('/register', [Controller::class, 'register']); // Ruta para registrar un nuevo usuario (no requiere autenticación)
    Route::post('/login', [Controller::class, 'login']); // Ruta para iniciar sesión (login) de un usuario (no requiere autenticación)

    // Agrupamos rutas que requieren que el usuario esté autenticado
    Route::middleware('auth:api')->group(function () {
        Route::post('/logout', [Controller::class, 'logout']); // Ruta para cerrar sesión (logout) de un usuario autenticado
    });
});