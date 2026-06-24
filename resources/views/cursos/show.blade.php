@extends('layouts.app')
@section('title', $curso->nome)

@section('content')
<div class="max-w-3xl mx-auto">
    <!-- Botão voltar -->
    <a href="{{ route('cursos.index') }}" class="text-gray-400 hover:text-white text-sm mb-6 inline-block">
        ← Voltar para Cursos
    </a>

    <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
        @if($curso->imagem)
            <img src="{{ Storage::url($curso->imagem) }}" alt="{{ $curso->nome }}" class="w-full h-64 object-cover">
        @endif

        <div class="p-8">
            <h1 class="text-3xl font-bold text-white">{{ $curso->nome }}</h1>

            <div class="flex gap-3 mt-4 flex-wrap">
                <span class="bg-red-900/40 border border-red-700 text-red-300 text-sm px-3 py-1 rounded-full">
                    {{ $curso->turno }}
                </span>
                <span class="bg-gray-800 text-gray-300 text-sm px-3 py-1 rounded-full">
                    {{ $curso->periodo }}
                </span>
                <span class="bg-gray-800 text-gray-300 text-sm px-3 py-1 rounded-full">
                    {{ $curso->vagas }} vagas disponíveis
                </span>
            </div>

            <p class="text-gray-300 mt-6 leading-relaxed">{{ $curso->descricao }}</p>

            @if(auth()->check() && auth()->user()->isAdmin())
                <div class="flex gap-4 mt-8 pt-6 border-t border-gray-800">
                    <a href="{{ route('cursos.edit', $curso) }}"
                       class="bg-gray-700 hover:bg-gray-600 text-white px-5 py-2 rounded-lg text-sm transition">
                        Editar Curso
                    </a>
                    <form method="POST" action="{{ route('cursos.destroy', $curso) }}"
                          onsubmit="return confirm('Tem certeza que deseja excluir este curso?')">
                        @csrf @method('DELETE')
                        <button type="submit"
                                class="bg-red-900/40 hover:bg-red-800 border border-red-700 text-red-300 px-5 py-2 rounded-lg text-sm transition">
                            Excluir Curso
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection