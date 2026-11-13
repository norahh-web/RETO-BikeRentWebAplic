<x-public-layout>
    <a href="{{ route('bikes.show', $bike) }}" class="text-sm text-gray-600 hover:underline">← Volver a la bicicleta</a>

    <div class="mt-4 bg-white rounded-lg shadow p-6 max-w-xl">
        <h1 class="text-2xl font-bold">Reservar bicicleta</h1>

        <div class="mt-4 text-sm text-gray-700 space-y-1">
            <p><span class="text-gray-500">Modelo:</span> {{ $bike->model }}</p>
            <p><span class="text-gray-500">Nº de serie:</span> {{ $bike->serial_number }}</p>
            <p>
                <span class="text-gray-500">Precio:</span>
                {{ number_format($bike->price_per_hour, 2, ',', '.') }} €/hora
            </p>
        </div>

        <form method="POST" action="{{ route('bookings.store') }}" class="mt-6 space-y-4">
            @csrf
            <input type="hidden" name="bike_id" value="{{ $bike->id }}">

            @error('bike_id')
                <p class="text-sm text-red-700">{{ $message }}</p>
            @enderror

            <div>
                <label for="start_time" class="block text-sm font-medium">Inicio de la reserva</label>
                <input type="datetime-local" id="start_time" name="start_time"
                       value="{{ old('start_time') }}"
                       class="mt-1 w-full rounded border-gray-300" required>
                @error('start_time')
                    <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="end_time" class="block text-sm font-medium">Devolución</label>
                <input type="datetime-local" id="end_time" name="end_time"
                       value="{{ old('end_time') }}"
                       class="mt-1 w-full rounded border-gray-300" required>
                @error('end_time')
                    <p class="mt-1 text-sm text-red-700">{{ $message }}</p>
                @enderror
            </div>

            <p class="text-xs text-gray-500">
                El coste total se calcula automáticamente según las horas reservadas.
            </p>

            <button type="submit"
                    class="rounded bg-green-700 px-5 py-2 text-white hover:bg-green-600">
                Confirmar reserva
            </button>
        </form>
    </div>
</x-public-layout>