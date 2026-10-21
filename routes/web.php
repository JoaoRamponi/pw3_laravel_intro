
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\EventoController;
use App\Models\User;
use App\Http\Controller\CantinaController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('/landing', 'landing')->name('landing');

// Rotas do painel administrativo
Route::get('/admin', [UserController::class, 'index'])->name('admin.dashboard');

// Rotas de usuários
Route::get('/usuarios/novo', [UserController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UserController::class, 'store'])->name('usuarios.store');

Route::get('/usuarios/{id}/editar', [UserController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');

// Rotas de livros
Route::get('/livros', [LivroController::class, 'index'])->name('livros.index');
Route::post('/livros', [LivroController::class, 'store'])->name('livros.store');

// Rotas de eventos
Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
Route::get('/eventos/novo', [EventoController::class, 'create'])->name('eventos.create');
Route::post('/eventos', [EventoController::class, 'store'])->name('eventos.store');

// Rota para testar o ORM
Route::get('/teste-orm', function () {
    User::create([
        'name' => 'Ana Clara Santos',
        'email' => 'ana.santos@escola.sp.gov.br',
        'password' => bcrypt('12345678')
    ]);

    return User::all();
});

Route::resource('cantinas', CantinaController::class);
