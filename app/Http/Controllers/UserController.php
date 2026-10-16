
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Exibe a lista de usuários e permite pesquisar pelo nome.
     */
    public function index(Request $request)
    {
        $busca = $request->input('busca');

        if ($busca) {
            $usuarios = User::where('name', 'like', "%{$busca}%")
                ->orderBy('name', 'asc')
                ->get();
        } else {
            $usuarios = User::orderBy('name', 'asc')->get();
        }

        return view('admin.dashboard', compact('usuarios', 'busca'));
    }

    /**
     * Exibe o formulário de cadastro de usuários.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Salva um novo usuário no banco de dados.
     */
    public function store(Request $request)
    {
        $dadosValidados = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $dadosValidados['password'] = bcrypt($dadosValidados['password']);

        User::create($dadosValidados);

        return redirect('/admin')->with(
            'sucesso',
            'Usuário cadastrado com sucesso.'
        );
    }

    /**
     * Localiza o usuário pelo ID e exibe o formulário de edição.
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);

        return view('users.edit', compact('usuario'));
    }

    /**
     * Valida os dados e atualiza o usuário.
     */
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $dadosValidados = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($usuario->id),
            ],
            'password' => 'nullable|min:6',
        ]);

        if (empty($dadosValidados['password'])) {
            unset($dadosValidados['password']);
        } else {
            $dadosValidados['password'] = bcrypt($dadosValidados['password']);
        }

        $usuario->update($dadosValidados);

        return redirect('/admin')->with(
            'sucesso',
            'Usuário atualizado com sucesso.'
        );
    }

    /**
     * Remove o usuário do banco de dados.
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);

        $usuario->delete();

        return redirect('/admin')->with(
            'sucesso',
            'Usuário removido com sucesso.'
        );
    }
}
