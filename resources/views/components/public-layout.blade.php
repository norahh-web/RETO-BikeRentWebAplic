<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'BikeRentWeb') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 text-gray-900">
    <nav class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="{{ route('bikes.index') }}" class="text-lg font-semibold">🚲 BikeRentWeb</a>

            <div class="flex items-center gap-4 text-sm">
                @auth
                    <span class="text-gray-600">{{ Auth::user()->name }}</span>
                    <a href="{{ route('dashboard') }}" class="hover:underline">Panel</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="hover:underline">Cerrar sesión</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:underline">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="hover:underline">Registrarse</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if (session('success'))
            <div class="mb-6 rounded bg-green-100 text-green-800 px-4 py-3">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="mb-6 rounded bg-red-100 text-red-800 px-4 py-3">{{ session('error') }}</div>
        @endif

        {{ $slot }}
    </main>
</body>
</html>
