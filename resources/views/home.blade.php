@extends('layouts.app')
@section('title', 'Início')

@section('content')
<!-- Hero -->
<section class="text-center py-16">
    <h1 class="text-5xl font-bold text-white mb-4">
        Bem-vindo à <span class="text-red-500">ETEC Zona Leste</span>
    </h1>
    <p class="text-gray-400 text-lg max-w-2xl mx-auto">
        Formando profissionais para o futuro. Conheça nossos cursos técnicos e fique por dentro dos eventos.
    </p>
    <div class="mt-8 flex gap-4 justify-center">
        <a href="{{ route('cursos.index') }}" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold transition">
            Ver Cursos
        </a>
        <a href="{{ route('eventos.index') }}" class="border border-red-600 text-red-400 hover:bg-red-600 hover:text-white px-6 py-3 rounded-lg font-semibold transition">
            Ver Eventos
        </a>
    </div>
</section>

<!-- Cursos em destaque -->
<section class="mt-12">
    <h2 class="text-2xl font-bold text-white mb-6 border-l-4 border-red-500 pl-4">Cursos em Destaque</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($cursos as $curso)
        <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden hover:border-red-700 transition">
            @if($curso->imagem)
                <img src="{{ Storage::url($curso->imagem) }}" alt="{{ $curso->nome }}" class="w-full h-40 object-cover">
            @else
                <div class="w-full h-40 bg-gray-800 flex items-center justify-center text-gray-600">Sem imagem</div>
            @endif
            <div class="p-4">
                <h3 class="text-white font-semibold text-lg">{{ $curso->nome }}</h3>
                <p class="text-gray-400 text-sm mt-1 line-clamp-2">{{ $curso->descricao }}</p>
                <a href="{{ route('cursos.show', $curso) }}" class="mt-3 inline-block text-red-400 text-sm hover:underline">Ver mais →</a>
            </div>
        </div>
        @empty
            <p class="text-gray-500 col-span-3">Nenhum curso cadastrado ainda.</p>
        @endforelse
    </div>
</section>

<!-- Eventos em destaque -->
<section class="mt-12">
    <h2 class="text-2xl font-bold text-white mb-6 border-l-4 border-red-500 pl-4">Próximos Eventos</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($eventos as $evento)
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5 hover:border-red-700 transition">
            <span class="text-red-400 text-xs font-semibold uppercase tracking-wider">{{ $evento->data->format('d/m/Y') }}</span>
            <h3 class="text-white font-semibold text-lg mt-1">{{ $evento->nome }}</h3>
            <p class="text-gray-400 text-sm mt-1 line-clamp-2">{{ $evento->descricao }}</p>
            <p class="text-gray-500 text-xs mt-2">📍 {{ $evento->local }} · {{ $evento->turno }}</p>
            <a href="{{ route('eventos.show', $evento) }}" class="mt-3 inline-block text-red-400 text-sm hover:underline">Saiba mais →</a>
        </div>
        @empty
            <p class="text-gray-500 col-span-3">Nenhum evento agendado.</p>
        @endforelse
    </div>
</section>
@endsection