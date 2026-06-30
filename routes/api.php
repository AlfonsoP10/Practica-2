<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\CategoriaController;

// Rutas públicas
Route::post('/login', [AuthController::class, 'login']);

Route::apiResource('categorias', CategoriaController::class);

// Rutas protegidas
Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/perfil', [AuthController::class, 'perfil']);

    Route::apiResource('productos', ProductoController::class);

});