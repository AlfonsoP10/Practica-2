<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/panel', function () {
    return 'Bienvenido Administrador';
})->middleware('verificar.rol:admin');

Route::get('/prueba-log', function () {
    return 'Middleware de logging funcionando';
})->middleware('registrar.peticion');

Route::get('/movil', function () {
    return 'Has sido redirigido porque usas un dispositivo móvil.';
});

Route::get('/inicio', function () {
    return 'Página de inicio';
})->middleware('solo.celular');

Route::get('/productos', function () {
    return 'Lista de productos';
})->middleware('solo.celular');

Route::get('/contacto', function () {
    return 'Página de contacto';
})->middleware('solo.celular');