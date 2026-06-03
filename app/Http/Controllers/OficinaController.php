<?php

namespace App\Http\Controllers;

use App\Models\Oficina;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class OficinaController extends Controller
{
    public function index() {
        $oficinas = Oficina::orderBy('nome')->get();
        return view('oficinas.index', compact('oficinas'));
    }

    public function store(Request $request) {   

        $dados = $request->validate([
            'nome_oficina' => 'required|min:4',
            'professor_responsavel' => 'required|min:4',
            'carga_horaria' => 'required|integer|min:20|max:120',
            'turno' => 'required'
        ]);

        Oficina::create($dados);

        return redirect('/oficinas');
    }
}
