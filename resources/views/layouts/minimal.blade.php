<!DOCTYPE html>
<html lang="pt-BR" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Zona Leste - @yield('title', 'Página não encontrada')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background-color: #030712; color: #f3f4f6;" class="min-h-screen flex flex-col">

    <header class="bg-gray-900 border-b border-red-700 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-3">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/etec-logo.png') }}" alt="ETEC Zona Leste" class="h-10">
            </a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-8 w-full flex-1">
        @yield('content')
    </main>

    <footer class="bg-gray-900 border-t border-gray-800 py-6 text-center text-gray-500 text-sm">
        © {{ date('Y') }} ETEC Zona Leste. Todos os direitos reservados.
    </footer>

</body>
</html>