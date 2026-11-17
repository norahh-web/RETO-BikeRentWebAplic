<x-public-layout>
    <a href="{{ route('bikes.show', $bike) }}" class="">← Volver a la bicicleta</a>

    <div class="">
        <h1 class="">Reservar bicicleta</h1>

        <div class="">
            <p><span class="">Modelo:</span> {{ $bike->model }}</p>
            <p><span class="">Nº de serie:</span> {{ $bike->serial_number }}</p>
            <p>
                <span class="">Precio:</span>
                {{ number_format($bike->price_per_hour, 2, ',', '.') }} €/hora
            </p>
        </div>

        <form method="POST" action="{{ route('bookings.store') }}" class="">
            @csrf
            <input type="hidden" name="bike_id" value="{{ $bike->id }}">

            @error('bike_id')
                <p class="">{{ $message }}</p>
            @enderror

            <div>
                <label for="start_time" class="">Inicio de la reserva</label>
                <input type="datetime-local" id="start_time" name="start_time"
                       value="{{ old('start_time') }}"
                       class="" required>
                @error('start_time')
                    <p class="">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="end_time" class="">Devolución</label>
                <input type="datetime-local" id="end_time" name="end_time"
                       value="{{ old('end_time') }}"
                       class="" required>
                @error('end_time')
                    <p class="">{{ $message }}</p>
                @enderror
            </div>

            <p class="">
                El coste total se calcula automáticamente según las horas reservadas.
            </p>

            <button type="submit"
                    class="">
                Confirmar reserva
            </button>
        </form>
    </div>
</x-public-layout>