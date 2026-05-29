<?php

use App\Http\Controllers\PrudutoController;
use App\Models\Produto;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos', [PrudutoController::class, 'index']);
Route::post('/produtos', [PrudutoController::class, 'store']);
