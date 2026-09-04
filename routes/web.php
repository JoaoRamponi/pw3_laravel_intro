<?php

use App\Models\User;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\livrosController;
use App\Http\Controllers\PrudutoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::view('/landing', 'landing');
Route::view('/admin', 'admin.dashboard');

// Rota para carregar o fourmulario (GET)
Route::get('/usuarios/novo', [UserController::class, 'create']);

// Rota para salvar os dados enviado (POST)
Route::post ('usuarios', [UserController::class, 'store']);

Route::get('/teste-orm', function () {
    User::create([
        'name' => 'João Victor',
        'email' => 'joaoVictor@escola.sp.gov.br',
        'password' => '12345678'
    ]);

    return User::all();
});

Route::get('/oficinas', [OficinaController::class, 'index']);
Route::post('/oficinas', [OficinaController::class, 'store']);

Route::get('/produtos', [PrudutoController::class, 'index']);
Route::post('/produtos', [PrudutoController::class, 'store']);

Route::get('/livros', [livrosController::class, 'index']);
Route::post('/livros', [livrosController::class, 'store']);