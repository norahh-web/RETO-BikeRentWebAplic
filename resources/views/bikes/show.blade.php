<x-public-layout>
    <a href="{{ route('bikes.index') }}" class="text-sm text-gray-600 hover:underline">← Volver al catálogo</a>

    <div class="mt-4 bg-white rounded-lg shadow p-6 max-w-xl">
        <h1 class="text-2xl font-bold">{{ $bike->model }}</h1>

        <dl class="mt-4 space-y-2 text-sm">
            <div class="flex justify-between">
                <dt class="text-gray-500">Nº de serie</dt>
                <dd>{{ $bike->serial_number }}</dd>
            </div>
            <div class="flex justify-between">
                <dt class="text-gray-500">Precio</dt>
                <dd class="font-semibold">{{ number_format($bike->price_per_hour, 2, ',', '.') }} €/hora</dd>
            </div>
            <div class="flex justify-between">
                <dt class="text-gray-500">Estado</dt>
                <dd>{{ $bike->status === 'available' ? 'Disponible' : 'No disponible' }}</dd>
            </div>
        </dl>

        <div class="mt-6">
            @if ($bike->status !== 'available')
                <p class="text-red-700">Esta bicicleta no está disponible para alquilar.</p>
            @elseif (Route::has('bookings.create'))
                <a href="{{ route('bookings.create', $bike) }}"
                   class="inline-block rounded bg-green-700 px-5 py-2 text-white hover:bg-green-600">
                    Reservar
                </a>
            @else
                <span class="inline-block rounded bg-gray-300 px-5 py-2 text-gray-600">
                    Reservar (próximamente)
                </span>
            @endif
        </div>
    </div>
</x-public-layout>
