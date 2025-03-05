<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
/*
Route::get('/', function () {
    return ('Pantalla principal');
});
*/

/*
Route::get('/login', function () {
    return 'Login usuario';
});
*/

/*
Route::get('/logout', function () {
    return 'Logout usuario';
});

Route::get('/catalog', function () {
    return 'Listado películas';
});

Route::get('/catalog/show/{id}', function ($id) {
    return 'Vista detalle película '.$id;
});

Route::get('/catalog/create', function() {
    return 'Añadir película';
});

Route::get('/catalog/edit/{id}', function ($id) {
    return 'Modificar película '.$id;
});
*/
/*  VISTAS  

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/catalog', function () {
    return view('catalog.index');
});

Route::get('/catalog/show/{id}', function ($id) {
    return view('catalog.show', array('id'=>$id));
});

Route::get('/catalog/create', function() {
    return view('catalog.create');
});

Route::get('/catalog/edit/{id}', function ($id) {
    return view('catalog.edit', array('id'=>$id));
});
*/
/* CONTROLADORES */

Route::get('/', [HomeController::class, 'getHome']);
Route::get('/catalog', [CatalogController::class, 'getIndex']);
Route::get('/catalog/show/{id}', [CatalogController::class, 'getShow']);
Route::get('/catalog/create', [CatalogController::class, 'getCreate']);
Route::get('/catalog/edit/{id}', [CatalogController::class, 'getEdit']);