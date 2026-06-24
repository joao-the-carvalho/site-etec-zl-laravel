<!DOCTYPE html>
<html lang="pt-BR" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Zona Leste - @yield('title', 'Início')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background-color: #030712; color: #f3f4f6;" class="min-h-screen flex flex-col">

    <nav class="bg-gray-900 border-b border-red-700 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-red-500 font-bold text-xl tracking-wide">
                <img src="{{ asset('images/etec-logo.png') }}" alt="ETEC Zona Leste" class="h-10">
            </a>
            <div class="flex gap-6 items-center text-sm">
                <a href="{{ route('home') }}" class="hover:text-red-400 transition">Início</a>
                <a href="{{ route('cursos.index') }}" class="hover:text-red-400 transition">Cursos</a>
                <a href="{{ route('eventos.index') }}" class="hover:text-red-400 transition">Eventos</a>
                <a href="{{ route('contato') }}" class="hover:text-red-400 transition">Contato</a>

                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.usuarios.index') }}" class="hover:text-red-400 transition">Usuários</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="hover:text-red-400 transition">Sair</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:text-red-400 transition">Entrar</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Flash messages -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto mt-4 px-4">
            <div class="bg-red-900/40 border border-red-600 text-red-300 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        </div>
    @endif
    @if(session('error'))
        <div class="max-w-7xl mx-auto mt-4 px-4">
            <div class="bg-red-900/40 border border-red-600 text-red-300 px-4 py-3 rounded">
                {{ session('error') }}
            </div>
        </div>
    @endif

    <main class="max-w-7xl mx-auto px-4 py-8 w-full flex-1">
        @yield('content')
    </main>

    <footer class="bg-gray-900 border-t border-gray-800 mt-16 py-6 text-center text-gray-500 text-sm">
        © {{ date('Y') }} ETEC Zona Leste. Todos os direitos reservados.
    </footer>

</body>
</html>