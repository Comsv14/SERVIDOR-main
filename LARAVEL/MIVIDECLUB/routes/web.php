<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    echo 'Hola mundo';
});


Route::get('/pagina1', function () {
    return 'Hola mundo desde la página 1';
});

Route::get('pagina2/{id}', function ($id) {
    where('id', '[0-9]+');
    return 'User '.$id;
});

Route::get('user/{name?}', function ($name = null) {
    return $name;
});