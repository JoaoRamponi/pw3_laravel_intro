<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Exibe o formulario de cadastro de usuarios
    public function create()
    {
        return view('users.create');
    }

    // Salva no banco de dados
    public function store(Request $request)
    {
        $dadosValidados = $request -> validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // Persistencia no banco usando o ORM Eloquent
        User::create($dadosValidados);

        // Redireciona para o painel adm com mensagem de sucesso
        return redirect('/admin') -> with('sucesso', 'Usuario cadastrado com sucesso.');
    }
}
