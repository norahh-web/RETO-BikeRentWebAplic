<x-public-layout>
    <section class="">
        <h1 class="">Alquila tu bicicleta online</h1>
        <p class="">
            Consulta nuestro catálogo, elige la bicicleta que más te guste y reserva
            en unos minutos. Recógela en nuestra tienda en la fecha y hora que elijas.
        </p>

        <!-- Bloque de botones añadido en la cabecera -->
        <div class="">
            <a href="#catalogo" class="">
                Ver catálogo
            </a>
            @auth
                <a href="{{ route('bookings.index') }}" class="">
                    Mis reservas
                </a>
            @endauth
        </div>
    </section>

    <section class="">
        <h2 class="">Quiénes somos</h2>
        <p class="">
            Somos una empresa de alquiler de bicicletas situada en Hondarribia.
            Nuestro objetivo es que descubras la zona sobre dos ruedas, tanto si
            buscas un paseo tranquilo por la costa como una ruta más exigente por
            el monte.
        </p>
        <p class="">
            Todas nuestras bicicletas se revisan antes de cada alquiler. Reservas
            online, las recoges en nuestra tienda y las devuelves en el mismo
            punto al terminar.
        </p>

        <h3 class="">Qué ofrecemos</h3>
        <div class="">
            <div class="">
                <h4 class="">Urbanas</h4>
                <p class="">Cómodas y ligeras, ideales para moverte por la ciudad y la costa.</p>
            </div>
            <div class="">
                <h4 class="">Montaña</h4>
                <p class="">Preparadas para caminos y pendientes, para quienes buscan algo más de aventura.</p>
            </div>
            <div class="">
                <h4 class="">Eléctricas</h4>
                <p class="">Con asistencia al pedaleo para llegar más lejos sin cansarte.</p>
            </div>
        </div>
    </section>

    <h2 id="catalogo" class="">Bicicletas disponibles</h2>

    @if ($bikes->isEmpty())
        <p class="">No hay bicicletas disponibles en este momento.</p>
    @else
        <div class="">
            @foreach ($bikes as $bike)
                <div class="">
                    <h3 class="">{{ $bike->model }}</h3>
                    <p class="">Nº de serie: {{ $bike->serial_number }}</p>
                    <p class="">
                        {{ number_format($bike->price_per_hour, 2, ',', '.') }} €/hora
                    </p>
                    <a href="{{ route('bikes.show', $bike) }}"
                       class="">
                        Ver detalle
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</x-public-layout>

