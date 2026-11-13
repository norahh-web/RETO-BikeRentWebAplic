<x-public-layout>
    <section class="bg-white rounded-lg shadow p-8 mb-10 text-center">
        <h1 class="text-3xl font-bold">Alquila tu bicicleta online</h1>
        <p class="mt-3 text-gray-600 max-w-2xl mx-auto">
            Consulta nuestro catálogo, elige la bicicleta que más te guste y reserva
            en unos minutos. Recógela en nuestra tienda en la fecha y hora que elijas.
        </p>

        <!-- Bloque de botones añadido en la cabecera -->
        <div class="mt-6 flex flex-wrap justify-center gap-3 text-sm">
            <a href="#catalogo" class="rounded bg-gray-800 px-5 py-2 text-white hover:bg-gray-700">
                Ver catálogo
            </a>
            @auth
                <a href="{{ route('bookings.index') }}" class="rounded bg-green-700 px-5 py-2 text-white hover:bg-green-600">
                    Mis reservas
                </a>
            @endauth
        </div>
    </section>

    <section class="bg-white rounded-lg shadow p-8 mb-10">
        <h2 class="text-2xl font-bold">Quiénes somos</h2>
        <p class="mt-3 text-gray-700">
            Somos una empresa de alquiler de bicicletas situada en Hondarribia.
            Nuestro objetivo es que descubras la zona sobre dos ruedas, tanto si
            buscas un paseo tranquilo por la costa como una ruta más exigente por
            el monte.
        </p>
        <p class="mt-3 text-gray-700">
            Todas nuestras bicicletas se revisan antes de cada alquiler. Reservas
            online, las recoges en nuestra tienda y las devuelves en el mismo
            punto al terminar.
        </p>

        <h3 class="mt-6 text-lg font-semibold">Qué ofrecemos</h3>
        <div class="mt-3 grid gap-4 sm:grid-cols-3">
            <div class="rounded border border-gray-200 p-4">
                <h4 class="font-semibold">Urbanas</h4>
                <p class="mt-1 text-sm text-gray-600">Cómodas y ligeras, ideales para moverte por la ciudad y la costa.</p>
            </div>
            <div class="rounded border border-gray-200 p-4">
                <h4 class="font-semibold">Montaña</h4>
                <p class="mt-1 text-sm text-gray-600">Preparadas para caminos y pendientes, para quienes buscan algo más de aventura.</p>
            </div>
            <div class="rounded border border-gray-200 p-4">
                <h4 class="font-semibold">Eléctricas</h4>
                <p class="mt-1 text-sm text-gray-600">Con asistencia al pedaleo para llegar más lejos sin cansarte.</p>
            </div>
        </div>
    </section>

    <h2 id="catalogo" class="text-2xl font-bold mb-6">Bicicletas disponibles</h2>

    @if ($bikes->isEmpty())
        <p class="text-gray-600">No hay bicicletas disponibles en este momento.</p>
    @else
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($bikes as $bike)
                <div class="bg-white rounded-lg shadow p-5">
                    <h3 class="text-lg font-semibold">{{ $bike->model }}</h3>
                    <p class="text-sm text-gray-500">Nº de serie: {{ $bike->serial_number }}</p>
                    <p class="mt-3 text-xl font-bold">
                        {{ number_format($bike->price_per_hour, 2, ',', '.') }} €/hora
                    </p>
                    <a href="{{ route('bikes.show', $bike) }}"
                       class="inline-block mt-4 rounded bg-gray-800 px-4 py-2 text-sm text-white hover:bg-gray-700">
                        Ver detalle
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</x-public-layout>

