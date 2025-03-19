<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginasController;

Route::get('/', function () {
    return view('home', array('nombre' => 'Pedro'));
    
});

Route::get('pagina1', [PaginasController::class, 'pagina1']);

Route::get('pagina2/{id}', [PaginasController::class, 'pagina2']);

Route::get('pagina3/{name?}', [PaginasController::class, 'pagina3']);