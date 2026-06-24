@extends('layouts.app')
@section('title', 'Editar Evento')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold text-white mb-6 border-l-4 border-red-500 pl-4">Editar Evento</h1>
    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
        <form method="POST" action="{{ route('eventos.update', $evento) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            @include('eventos.partials.form')
            <div class="flex gap-4 mt-6">
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-semibold transition">Atualizar</button>
                <a href="{{ route('eventos.index') }}" class="text-gray-400 hover:text-white px-4 py-2 transition">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection