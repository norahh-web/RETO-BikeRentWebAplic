<x-public-layout>
    <a href="{{ route('bookings.index') }}" class="text-sm text-gray-600 hover:underline">← Volver a mis reservas</a>

    <div class="mt-4 bg-white rounded-lg shadow p-6 max-w-xl">
        <h1 class="text-2xl font-bold">Reserva #{{ $booking->id }}</h1>

        <dl class="mt-4 space-y-2 text-sm">
            <div class="flex justify-between">
                <dt class="text-gray-500">Bicicleta</dt>
                <dd>{{ $booking->bike->model }} ({{ $booking->bike->serial_number }})</dd>
            </div>
            <div class="flex justify-between">
                <dt class="text-gray-500">Inicio</dt>
                <dd>{{ $booking->start_time->format('d/m/Y H:i') }}</dd>
            </div>
            <div class="flex justify-between">
                <dt class="text-gray-500">Devolución</dt>
                <dd>{{ $booking->end_time->format('d/m/Y H:i') }}</dd>
            </div>
            <div class="flex justify-between">
                <dt class="text-gray-500">Total</dt>
                <dd class="font-semibold">{{ number_format($booking->total_cost, 2, ',', '.') }} €</dd>
            </div>
            <div class="flex justify-between">
                <dt class="text-gray-500">Estado</dt>
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
            <form method="POST" action="{{ route('bookings.cancel', $booking) }}" class="mt-6"
                  onsubmit="return confirm('¿Cancelar esta reserva?')">
                @csrf
                @method('PATCH')
                <button type="submit" class="rounded bg-red-700 px-4 py-2 text-white hover:bg-red-600">
                    Cancelar reserva
                </button>
            </form>
        @endif
    </div>
</x-public-layout>