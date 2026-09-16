<?php

use App\Models\User;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\livrosController;
use App\Http\Controllers\PrudutoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;


Route::get('/', function () {
    return view('home');
});

Route::view('/landing', 'landing');
Route::view('/admin', 'admin.dashboard');

Route::get('/teste-orm', function () {
    User::create([
        'name' => 'João Victor',
        'email' => 'joaoVictor@escola.sp.gov.br',
        'password' => '12345678'
    ]);

    return User::all();
});

// Rotas da Agenda de Eventos
Route::get('/eventos', [EventoController::class, 'index']);
Route::get('/eventos/novo', [EventoController::class, 'create']);
Route::post('/eventos', [EventoController::class, 'store']);

Route::get('/oficinas', [OficinaController::class, 'index']);
Route::post('/oficinas', [OficinaController::class, 'store']);

Route::get('/produtos', [PrudutoController::class, 'index']);
Route::post('/produtos', [PrudutoController::class, 'store']);

Route::get('/livros', [livrosController::class, 'index']);
Route::post('/livros', [livrosController::class, 'store']);