<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', array('nombre' => 'Pedro'));
});


Route::get('/pagina1', function () {
    return 'Hola mundo desde la página 1';
});

Route::get('pagina2/{id}', function ($id) {
    return 'User ' . $id;
})->where('id', '[0-9]+');


Route::get('user/{id}', function ($name = null) {
    return $id;
});