<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PictogramController;
use App\Http\Controllers\AgendaController;

Route::get('/pictograms', [PictogramController::class, 'index'])->name('pictograms.index');
Route::get('/agenda/create', [AgendaController::class, 'create'])->name('agenda.create');
Route::post('/agenda/store', [AgendaController::class, 'store'])->name('agenda.store');
Route::get('/agenda', [AgendaController::class, 'list'])->name('agenda.list');
