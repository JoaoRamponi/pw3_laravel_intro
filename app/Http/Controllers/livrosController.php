<?php

namespace App\Http\Controllers;

use App\Models\livros;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class livrosController extends Controller
{
    public function index() {
        $livros = livros::orderBy('titulo')->get();
        return view('livros.index', compact('livros'));
    }

    public function store(Request $request) {

        $dados = $request->validate([
            'titulo' => 'required|min:2',
            'autor' => 'required|min:2',
            'ano_publicacao' => 'required|integer|min:1000',
        ]);

        livros::create($dados);

        return redirect('/livros');
    }
}