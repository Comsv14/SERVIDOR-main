<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;

Route::get('/', [HomeController::class, 'getHome']);

Route::get('login', function () {
    return view('auth.login');
   /*  return 'Login usuario'; */
});

Route::get('logout', function () {
    return 'Logout usuario';
});

Route::get('catalog', [CatalogController::class, 'getIndex']);

Route::get('catalog/show/{id}', [CatalogController::class, 'getShow']);

Route::get('catalog/create', [CatalogController::class, 'getCreate']);

Route::get('catalog/edit/{id}', [CatalogController::class, 'getEdit']);
