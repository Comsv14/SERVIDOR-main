<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PictogramaController;
use App\Http\Controllers\AgendaController;

// Ejercicio 1: Listado de pictogramas http://localhost:8000/pictogramas

Route::get('/pictogramas', [PictogramaController::class, 'index']);

// Ejercicio 2: Formulario para crear nueva entrada en la agenda 
 
Route::get('/agenda/create', [AgendaController::class, 'create']);
// Procesar la inserción en la agenda
Route::post('/agenda/store', [AgendaController::class, 'store']);

// Ejercicio 3: Mostrar formulario para consultar agenda
Route::get('/agenda/show', [AgendaController::class, 'showForm']);
// Procesar la consulta de la agenda
Route::post('/agenda/show', [AgendaController::class, 'showAgenda']);

// http://localhost:8000/pictogramas
// http://localhost:8000/agenda/create
// http://localhost:8000/agenda/show

