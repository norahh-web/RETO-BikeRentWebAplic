<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mis reservas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">

            @if (session('success'))
                <div class="rounded bg-green-100 text-green-800 px-4 py-3">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="rounded bg-red-100 text-red-800 px-4 py-3">{{ session('error') }}</div>
            @endif

            @if ($bookings->isEmpty())
                <div class="bg-white shadow-sm sm:rounded-lg p-6 text-gray-700">
                    Todavía no has realizado ninguna reserva.
                    <a href="{{ route('bikes.index') }}" class="underline">Ver el catálogo</a>
                </div>
            @else
                @foreach ($bookings as $booking)
                    <div class="bg-white shadow-sm sm:rounded-lg p-6 flex flex-wrap items-center justify-between gap-4">
                        <div class="text-sm space-y-1">
                            <h3 class="text-lg font-semibold">{{ $booking->bike->model }}</h3>
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
            @endif
        </div>
    </div>
</x-app-layout>