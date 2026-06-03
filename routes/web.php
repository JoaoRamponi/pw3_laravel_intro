<?php

use App\Http\Controllers\OficinaController;
use Illuminate\Support\Facades\Route;

Route::get('/oficinas', [OficinaController::class, 'index']);
Route::post('/oficinas', [OficinaController::class, 'store']);