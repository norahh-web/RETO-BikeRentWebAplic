<x-public-layout>
    <a href="{{ route('bikes.index') }}" class="">← Volver al catálogo</a>

    <div class="">
        <h1 class="">{{ $bike->model }}</h1>

        <dl class="">
            <div class="">
                <dt class="">Nº de serie</dt>
                <dd>{{ $bike->serial_number }}</dd>
            </div>
            <div class="">
                <dt class="">Precio</dt>
                <dd class="">{{ number_format($bike->price_per_hour, 2, ',', '.') }} €/hora</dd>
            </div>
            <div class="">
                <dt class="">Estado</dt>
                <dd>{{ $bike->status === 'available' ? 'Disponible' : 'No disponible' }}</dd>
            </div>
        </dl>

        <div class="">
            @if ($bike->status !== 'available')
                <p class="">Esta bicicleta no está disponible para alquilar.</p>
            @elseif (Route::has('bookings.create'))
                <a href="{{ route('bookings.create', $bike) }}"
                   class="">
                    Reservar
                </a>
            @else
                <span class="">
                    Reservar (próximamente)
                </span>
            @endif
        </div>
    </div>
</x-public-layout>
