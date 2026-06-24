@extends('layouts.app')
@section('title', 'Eventos')

@section('content')
<div class="flex items-center justify-between mb-8">
    <h1 class="text-3xl font-bold text-white border-l-4 border-red-500 pl-4">Eventos</h1>
    @if(auth()->check() && auth()->user()->isAdmin())
        <a href="{{ route('eventos.create') }}" class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg text-sm font-semibold transition">
            + Novo Evento
        </a>
    @endif
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @forelse($eventos as $evento)
    <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden hover:border-red-700 transition">
        @if($evento->imagem)
            <img src="{{ Storage::url($evento->imagem) }}" alt="{{ $evento->nome }}" class="w-full h-44 object-cover">
        @else
            <div class="w-full h-44 bg-gray-800 flex items-center justify-center text-gray-600 text-sm">Sem imagem</div>
        @endif
        <div class="p-5">
            <span class="text-red-400 text-xs font-semibold uppercase tracking-wider">
                {{ $evento->data->format('d/m/Y') }}
            </span>
            <h3 class="text-white font-bold text-lg mt-1">{{ $evento->nome }}</h3>
            <div class="flex gap-2 mt-2 flex-wrap">
                <span class="bg-gray-800 text-gray-400 text-xs px-2 py-1 rounded">{{ $evento->turno }}</span>
                <span class="bg-gray-800 text-gray-400 text-xs px-2 py-1 rounded">📍 {{ $evento->local }}</span>
                @if($evento->vagas)
                    <span class="bg-gray-800 text-gray-400 text-xs px-2 py-1 rounded">{{ $evento->vagas }} vagas</span>
                @endif
            </div>
            <p class="text-gray-400 text-sm mt-3 line-clamp-3">{{ $evento->descricao }}</p>

            <div class="flex items-center gap-3 mt-4">
                <a href="{{ route('eventos.show', $evento) }}" class="text-red-400 text-sm hover:underline">Ver detalhes</a>
                @if(auth()->check() && auth()->user()->isAdmin())
                    <a href="{{ route('eventos.edit', $evento) }}" class="text-gray-400 text-sm hover:text-white">Editar</a>
                    <form method="POST" action="{{ route('eventos.destroy', $evento) }}" onsubmit="return confirm('Excluir este evento?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-700 text-sm hover:text-red-500">Excluir</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
    @empty
        <p class="text-gray-500 col-span-3">Nenhum evento agendado.</p>
    @endforelse
</div>

<div class="mt-8">{{ $eventos->links() }}</div>
@endsection