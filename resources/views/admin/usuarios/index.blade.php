@extends('layouts.app')
@section('title', 'Usuários')

@section('content')
<div class="flex items-center justify-between mb-8">
    <h1 class="text-3xl font-bold text-white border-l-4 border-red-500 pl-4">Usuários</h1>
    <a href="{{ route('admin.usuarios.create') }}"
       class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg text-sm font-semibold transition">
        + Novo Usuário
    </a>
</div>

<div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-800 text-gray-400 uppercase text-xs">
            <tr>
                <th class="px-6 py-3 text-left">Nome</th>
                <th class="px-6 py-3 text-left">Email</th>
                <th class="px-6 py-3 text-left">Tipo</th>
                <th class="px-6 py-3 text-left">Ações</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-800">
            @forelse($usuarios as $usuario)
            <tr class="hover:bg-gray-800/50 transition">
                <td class="px-6 py-4 text-white">{{ $usuario->name }}</td>
                <td class="px-6 py-4 text-gray-400">{{ $usuario->email }}</td>
                <td class="px-6 py-4">
                    @if($usuario->role === 'professor')
                        <span class="bg-red-900/40 border border-red-700 text-red-300 text-xs px-2 py-1 rounded-full">
                            Professor
                        </span>
                    @else
                        <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded-full">
                            Aluno
                        </span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.usuarios.edit', $usuario) }}"
                        class="text-gray-400 hover:text-white text-sm transition">
                            Editar
                        </a>

                        @if($usuario->email !== 'admin@etec.sp.gov.br' && $usuario->id !== auth()->id())
                            <form method="POST" action="{{ route('admin.usuarios.destroy', $usuario) }}"
                                onsubmit="return confirm('Excluir este usuário?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-700 hover:text-red-500 text-sm">Excluir</button>
                            </form>
                        @else
                            <span class="text-gray-600 text-xs">—</span>
                        @endif
                    </div>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-gray-500">Nenhum usuário cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">{{ $usuarios->links() }}</div>
@endsection