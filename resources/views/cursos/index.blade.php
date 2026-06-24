@extends('layouts.app')
@section('title', 'Cursos')

@section('content')
<div class="flex items-center justify-between mb-8">
    <h1 class="text-3xl font-bold text-white border-l-4 border-red-500 pl-4">Cursos Técnicos</h1>
    @if(auth()->check() && auth()->user()->isAdmin())
        <a href="{{ route('cursos.create') }}" class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg text-sm font-semibold transition">
            + Novo Curso
        </a>
    @endif
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @forelse($cursos as $curso)
    <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden hover:border-red-700 transition">
        @if($curso->imagem)
            <img src="{{ Storage::url($curso->imagem) }}" alt="{{ $curso->nome }}" class="w-full h-44 object-cover">
        @else
            <div class="w-full h-44 bg-gray-800 flex items-center justify-center text-gray-600 text-sm">Sem imagem</div>
        @endif
        <div class="p-5">
            <h3 class="text-white font-bold text-lg">{{ $curso->nome }}</h3>
            <div class="flex gap-3 mt-2 text-xs text-gray-400">
                <span class="bg-gray-800 px-2 py-1 rounded">{{ $curso->turno }}</span>
                <span class="bg-gray-800 px-2 py-1 rounded">{{ $curso->periodo }}</span>
                <span class="bg-gray-800 px-2 py-1 rounded">{{ $curso->vagas }} vagas</span>
            </div>
            <p class="text-gray-400 text-sm mt-3 line-clamp-3">{{ $curso->descricao }}</p>

            <div class="flex items-center gap-3 mt-4">
                <a href="{{ route('cursos.show', $curso) }}" class="text-red-400 text-sm hover:underline">Ver detalhes</a>
                @if(auth()->check() && auth()->user()->isAdmin())
                    <a href="{{ route('cursos.edit', $curso) }}" class="text-gray-400 text-sm hover:text-white">Editar</a>
                    <form method="POST" action="{{ route('cursos.destroy', $curso) }}" onsubmit="return confirm('Excluir este curso?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-700 text-sm hover:text-red-500">Excluir</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
    @empty
        <p class="text-gray-500 col-span-3">Nenhum curso cadastrado.</p>
    @endforelse
</div>

<div class="mt-8">{{ $cursos->links() }}</div>
@endsection