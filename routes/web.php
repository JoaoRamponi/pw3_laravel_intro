<?php

use App\Http\Controllers\OficinaController;
use App\Http\Controllers\livrosController;
use App\Http\Controllers\PrudutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::view('/landing', 'landing');

Route::get('/oficinas', [OficinaController::class, 'index']);
Route::post('/oficinas', [OficinaController::class, 'store']);

Route::get('/produtos', [PrudutoController::class, 'index']);
Route::post('/produtos', [PrudutoController::class, 'store']);

Route::get('/livros', [livrosController::class, 'index']);
Route::post('/livros', [livrosController::class, 'store']);