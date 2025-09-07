<x-layouts.app :title="__('Detalle reserva')">
    <div class="card" style="max-width: 500px; margin: 2rem auto;">
        <h1 class="title-xl mb-4">Detalle de la reserva</h1>
        <div class="divide-y divide-gray-800">
            <div class="flex items-center justify-between py-2">
                <span class="badge badge-dark">ID</span>
                <span class="font-bold text-lg">{{ $reserva->id }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Evento</span>
                <span class="font-extrabold text-white text-lg">{{ $reserva->evento->titulo ?? '-' }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Proveedor</span>
                <span>{{ $reserva->proveedor->nombre_comercial ?? '-' }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Fecha reserva</span>
                <span>{{ $reserva->fecha_reserva }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Estado</span>
                <span class="font-semibold">{{ ucfirst($reserva->estado) }}</span>
            </div>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</x-layouts.app>
