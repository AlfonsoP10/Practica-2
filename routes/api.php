<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Api\ProductoController;

Route::apiResource('productos', ProductoController::class);
Route::apiResource('categorias', CategoriaController::class);