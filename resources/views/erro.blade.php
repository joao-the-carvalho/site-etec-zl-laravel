@extends('layouts.minimal')
@section('title', 'Erro')
    @section('content')
    
    <p class="text-gray-400 text-lg max-w-2xl mx-auto">Olá, você entrou em uma rota não existente. Para retornar para a página inicial, clique <a class="text-red-400 text-lg max-w-2xl mx-auto" href="{{ route('home') }}">AQUI</a> para voltar.</p>
    @endsection