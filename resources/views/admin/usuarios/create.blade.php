@extends('layouts.app')
@section('title', 'Novo Usuário')

@section('content')
<div class="max-w-lg mx-auto">
    <h1 class="text-2xl font-bold text-white mb-6 border-l-4 border-red-500 pl-4">Novo Usuário</h1>

    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
        @if($errors->any())
            <div class="bg-red-900/40 border border-red-700 text-red-300 px-4 py-3 rounded mb-6">
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.usuarios.store') }}">
            @csrf
            <div class="space-y-5">
                <div>
                    <label class="block text-sm text-gray-400 mb-1">Nome</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-2 focus:border-red-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm text-gray-400 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-2 focus:border-red-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm text-gray-400 mb-1">Senha</label>
                    <input type="password" name="password"
                           class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-2 focus:border-red-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm text-gray-400 mb-1">Confirmar Senha</label>
                    <input type="password" name="password_confirmation"
                           class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-2 focus:border-red-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm text-gray-400 mb-1">Tipo</label>
                    <select name="role"
                            class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-2 focus:border-red-500 focus:outline-none">
                        <option value="aluno" {{ old('role') == 'aluno' ? 'selected' : '' }}>Aluno</option>
                        <option value="professor" {{ old('role') == 'professor' ? 'selected' : '' }}>Professor</option>
                    </select>
                </div>
            </div>

            <div class="flex gap-4 mt-6">
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-semibold transition">
                    Cadastrar
                </button>
                <a href="{{ route('admin.usuarios.index') }}"
                   class="text-gray-400 hover:text-white px-4 py-2 transition">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection