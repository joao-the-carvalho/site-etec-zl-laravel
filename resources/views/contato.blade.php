@extends('layouts.app')
@section('title', 'Contato')

@section('content')
<h1 class="text-3xl font-bold text-white mb-8 border-l-4 border-red-500 pl-4">Contato</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <!-- Informações de Contato -->
    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 space-y-5">
        <h2 class="text-xl font-semibold text-white mb-4">Informações</h2>

        <div class="flex items-start gap-3">
            <div>
                <p class="text-gray-300 font-medium">Endereço</p>
                <p class="text-gray-400 text-sm">Av. Águia de Haia, 2633 - Cidade Antônio Estêvão de Carvalho, São Paulo - SP</p>
            </div>
        </div>

        <div class="flex items-start gap-3">
            <div>
                <p class="text-gray-300 font-medium">Telefone</p>
                <p class="text-gray-400 text-sm">(11) 2045-4000</p>
            </div>
        </div>

        <div class="flex items-start gap-3">
            <span class="text-red-500 text-xl">✉️</span>
            <div>
                <p class="text-gray-300 font-medium">E-mail</p>
                <p class="text-gray-400 text-sm">etec.zonaleste@cps.sp.gov.br</p>
            </div>
        </div>

        <div class="flex items-start gap-3">
            <span class="text-red-500 text-xl">🕒</span>
            <div>
                <p class="text-gray-300 font-medium">Horário de Atendimento</p>
                <p class="text-gray-400 text-sm">Segunda a Sexta: 9h às 21h</p>
                <p class="text-gray-400 text-sm">Fechada aos Sábados e Domingos</p>
            </div>
        </div>
    </div>

    <!-- Mapa -->
    <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.258806293517!2d-46.475812!3d-23.523192199999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce616495555555%3A0x8076d1577db86cf1!2sEtec%20da%20Zona%20Leste!5e0!3m2!1spt-BR!2sbr!4v1782265948083!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
    </div>
</div>
@endsection