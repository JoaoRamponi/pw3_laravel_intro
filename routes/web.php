<?php

use App\Http\Controllers\livrosController;
use App\Models\livros;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); 
});

Route::get('/livros', [livrosController::class, 'index']);
Route::post('/livros', [livrosController::class, 'store']);