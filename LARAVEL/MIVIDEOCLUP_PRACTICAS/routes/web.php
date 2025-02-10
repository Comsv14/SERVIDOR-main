<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo 'Pantalla Principal';
});
Route::get('/login', function () {
    echo 'Login Usuario';
});
Route::get('/logout', function () {
    echo 'Logout Usuario';
});
Route::get('/catalog', function () {
    echo 'Listado de películas';   
});
Route::get('/catalog/show/{id}', function ($id) {
    echo 'Vista detalle película ' . $id;
});
Route::get('/catalog/create', function () {
    echo 'Añadir película';
});

Route::get('/catalog/edit/{id}', function ($id) {
    echo 'Modificar película ' . $id;
});




