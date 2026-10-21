
@extends('layouts.app')

@section('title', 'Novo Usuário')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Formulário de Cadastro -->
    <section class="max-w-2xl mx-auto mt-8 bg-white p-6 rounded-xl shadow-sm ring-1 ring-slate-200">

        <!-- Cabeçalho -->
        <h2 class="text-2xl font-bold text-slate-900">
            Cadastrar Novo Usuário
        </h2>

        <p class="text-slate-600 mt-1">
            Preencha os dados do usuário para conceder acesso ao sistema.
        </p>

        <!-- Mensagem de Sucesso -->
        @if (session('sucesso'))
            <div class="mt-4 p-4 bg-emerald-50 border border-emerald-200 rounded-lg text-sm text-emerald-700">
                {{ session('sucesso') }}
            </div>
        @endif

        <!-- Erros de Validação -->
        @if ($errors->any())
            <div class="mt-4 p-4 bg-rose-50 border border-rose-200 rounded-lg text-sm text-rose-700">
                <p class="font-semibold text-rose-800">
                    Verifique os erros listados:
                </p>

                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Campos do Formulário -->
        <form
            action="{{ route('usuarios.store') }}"
            method="POST"
            class="mt-6 space-y-4"
        >
            @csrf

            <!-- Nome -->
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700">
                    Nome Completo
                </label>

                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    placeholder="Ex: João da Silva"
                    minlength="3"
                    maxlength="255"
                    autocomplete="name"
                    class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-900 focus:border-slate-500 focus:ring-1 focus:ring-slate-500 outline-none"
                    required
                >
            </div>

            <!-- E-mail -->
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700">
                    E-mail
                </label>

                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    placeholder="Ex: joao@empresa.com"
                    maxlength="255"
                    autocomplete="email"
                    class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-900 focus:border-slate-500 focus:ring-1 focus:ring-slate-500 outline-none"
                    required
                >
            </div>

            <!-- Senha -->
            <div>
                <label for="password" class="block text-sm font-medium text-slate-700">
                    Senha
                </label>

                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="No mínimo 6 caracteres"
                    minlength="6"
                    autocomplete="new-password"
                    class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-900 focus:border-slate-500 focus:ring-1 focus:ring-slate-500 outline-none"
                    required
                >
            </div>

            <!-- Botões -->
            <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50"
                >
                    Cancelar
                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700 transition-colors"
                >
                    Salvar Usuário
                </button>

            </div>
        </form>
    </section>
@endsection
