<x-public-layout>
    <a href="{{ route('bookings.index') }}" class="">← Volver a mis reservas</a>

    <div class="">
        <h1 class="">Reserva #{{ $booking->id }}</h1>

        <dl class="">
            <div class="">
                <dt class="">Bicicleta</dt>
                <dd>{{ $booking->bike->model }} ({{ $booking->bike->serial_number }})</dd>
            </div>
            <div class="">
                <dt class="">Inicio</dt>
                <dd>{{ $booking->start_time->format('d/m/Y H:i') }}</dd>
            </div>
            <div class="">
                <dt class="">Devolución</dt>
                <dd>{{ $booking->end_time->format('d/m/Y H:i') }}</dd>
            </div>
            <div class="">
                <dt class="">Total</dt>
                <dd class="">{{ number_format($booking->total_cost, 2, ',', '.') }} €</dd>
            </div>
            <div class="">
                <dt class="">Estado</dt>
                <dd>
                    {{ match($booking->status) {
                        'pending' => 'Pendiente',
                        'active' => 'Activa',
                        'completed' => 'Completada',
                        'cancelled' => 'Cancelada',
                        default => $booking->status,
                    } }}
                </dd>
            </div>
        </dl>

        @if ($booking->status === 'pending')
            <form method="POST" action="{{ route('bookings.cancel', $booking) }}" class=""
                  onsubmit="return confirm('¿Cancelar esta reserva?')">
                @csrf
                @method('PATCH')
                <button type="submit" class="">
                    Cancelar reserva
                </button>
            </form>
        @endif
    </div>
</x-public-layout>