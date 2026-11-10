<x-public-layout>
    <h1 class="text-2xl font-bold mb-6">Bicicletas disponibles</h1>

    @if ($bikes->isEmpty())
        <p class="text-gray-600">No hay bicicletas disponibles en este momento.</p>
    @else
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($bikes as $bike)
                <div class="bg-white rounded-lg shadow p-5">
                    <h2 class="text-lg font-semibold">{{ $bike->model }}</h2>
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
