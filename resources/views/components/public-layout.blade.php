<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'BikeRentWeb') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="">
    <nav class="">
        <div class="">
            <a href="{{ route('bikes.index') }}" class="">🚲 BikeRentWeb</a>

            <div class="">
                @auth
                    <a href="{{ route('profile.edit') }}" class="">{{ Auth::user()->name }}</a>
                    <a href="{{ route('dashboard') }}" class="">Panel</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="">Cerrar sesión</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="">Registrarse</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="">
        @if (session('success'))
            <div class="">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="">{{ session('error') }}</div>
        @endif

        {{ $slot }}
    </main>
</body>
</html>
