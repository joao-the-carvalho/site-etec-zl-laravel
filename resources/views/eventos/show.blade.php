@extends('layouts.app')
@section('title', $evento->nome)

@section('content')
<div class="max-w-3xl mx-auto">
    <a href="{{ route('eventos.index') }}" class="text-gray-400 hover:text-white text-sm mb-6 inline-block">
        ← Voltar para Eventos
    </a>

    <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
        @if($evento->imagem)
            <img src="{{ Storage::url($evento->imagem) }}" alt="{{ $evento->nome }}" class="w-full h-64 object-cover">
        @endif

        <div class="p-8">
            <span class="text-red-400 text-sm font-semibold uppercase tracking-wider">
                {{ $evento->data->format('d \d\e F \d\e Y') }}
            </span>
            <h1 class="text-3xl font-bold text-white mt-2">{{ $evento->nome }}</h1>

            <div class="flex gap-3 mt-4 flex-wrap">
                <span class="bg-red-900/40 border border-red-700 text-red-300 text-sm px-3 py-1 rounded-full">
                    {{ $evento->turno }}
                </span>
                <span class="bg-gray-800 text-gray-300 text-sm px-3 py-1 rounded-full">
                    📍 {{ $evento->local }}
                </span>
                @if($evento->vagas)
                    <span class="bg-gray-800 text-gray-300 text-sm px-3 py-1 rounded-full">
                        {{ $evento->vagas }} vagas
                    </span>
                @endif
            </div>

            <p class="text-gray-300 mt-6 leading-relaxed">{{ $evento->descricao }}</p>

            @if(auth()->check() && auth()->user()->isAdmin())
                <div class="flex gap-4 mt-8 pt-6 border-t border-gray-800">
                    <a href="{{ route('eventos.edit', $evento) }}"
                       class="bg-gray-700 hover:bg-gray-600 text-white px-5 py-2 rounded-lg text-sm transition">
                        Editar Evento
                    </a>
                    <form method="POST" action="{{ route('eventos.destroy', $evento) }}"
                          onsubmit="return confirm('Tem certeza que deseja excluir este evento?')">
                        @csrf @method('DELETE')
                        <button type="submit"
                                class="bg-red-900/40 hover:bg-red-800 border border-red-700 text-red-300 px-5 py-2 rounded-lg text-sm transition">
                            Excluir Evento
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection