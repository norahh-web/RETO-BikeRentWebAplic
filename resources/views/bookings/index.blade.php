<x-public-layout>
    <h1 class="">Mis reservas</h1>

    @if ($bookings->isEmpty())
        <p class="">Todavía no has realizado ninguna reserva.</p>
        <a href="{{ route('bikes.index') }}" class="">Ver el catálogo</a>
    @else
        <div class="">
            @foreach ($bookings as $booking)
                <div class="">
                    <div class="">
                        <h2 class="">{{ $booking->bike->model }}</h2>
                        <p>
                            <span class="">DesdeA:</span> {{ $booking->start_time->format('d/m/Y H:i') }}
                            <span class="">Hasta:</span> {{ $booking->end_time->format('d/m/Y H:i') }}
                        </p>
                        <p>
                            <span class="">Total:</span>
                            {{ number_format($booking->total_cost, 2, ',', '.') }} €
                        </p>
                        <p>
                            <span class="">Estado:</span>
                            {{ match($booking->status) {
                                'pending' => 'Pendiente',
                                'active' => 'Activa',
                                'completed' => 'Completada',
                                'cancelled' => 'Cancelada',
                                default => $booking->status,
                            } }}
                        </p>
                    </div>

                    <div class="">
                        <a href="{{ route('bookings.show', $booking) }}" class="">Ver detalle</a>

                        @if ($booking->status === 'pending')
                            <form method="POST" action="{{ route('bookings.cancel', $booking) }}"
                                  onsubmit="return confirm('¿Cancelar esta reserva?')">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="">
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