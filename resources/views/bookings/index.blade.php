<x-public-layout>
    <h1 class="text-2xl font-bold mb-6">Mis reservas</h1>

    @if ($bookings->isEmpty())
        <p class="text-gray-600">Todavía no has realizado ninguna reserva.</p>
        <a href="{{ route('bikes.index') }}" class="inline-block mt-4 text-sm underline">Ver el catálogo</a>
    @else
        <div class="space-y-4">
            @foreach ($bookings as $booking)
                <div class="bg-white rounded-lg shadow p-5 flex flex-wrap items-center justify-between gap-4">
                    <div class="text-sm space-y-1">
                        <h2 class="text-lg font-semibold">{{ $booking->bike->model }}</h2>
                        <p>
                            <span class="text-gray-500">Desde:</span> {{ $booking->start_time->format('d/m/Y H:i') }}
                            <span class="text-gray-500 ml-2">Hasta:</span> {{ $booking->end_time->format('d/m/Y H:i') }}
                        </p>
                        <p>
                            <span class="text-gray-500">Total:</span>
                            {{ number_format($booking->total_cost, 2, ',', '.') }} €
                        </p>
                        <p>
                            <span class="text-gray-500">Estado:</span>
                            {{ match($booking->status) {
                                'pending' => 'Pendiente',
                                'active' => 'Activa',
                                'completed' => 'Completada',
                                'cancelled' => 'Cancelada',
                                default => $booking->status,
                            } }}
                        </p>
                    </div>

                    <div class="flex items-center gap-3 text-sm">
                        <a href="{{ route('bookings.show', $booking) }}" class="underline">Ver detalle</a>

                        @if ($booking->status === 'pending')
                            <form method="POST" action="{{ route('bookings.cancel', $booking) }}"
                                  onsubmit="return confirm('¿Cancelar esta reserva?')">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="rounded bg-red-700 px-3 py-1 text-white hover:bg-red-600">
                                    Cancelar
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-public-layout>