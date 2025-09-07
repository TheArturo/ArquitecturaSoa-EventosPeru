
<x-layouts.app :title="__('Detalle evento')">
    <div class="card" style="max-width: 600px; margin: 2rem auto;">
        <h1 class="title-xl mb-4">Detalle del evento</h1>
        <div class="divide-y divide-gray-800">
            <div class="flex items-center justify-between py-2">
                <span class="badge badge-dark">ID</span>
                <span class="font-bold text-lg">{{ $evento->id }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="badge badge-info">Tipo de evento</span>
                <span>{{ $evento->tipo_evento ?? '-' }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Cliente</span>
                <span>{{ $evento->cliente->nombre ?? '-' }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Servicio</span>
                <span>{{ $evento->servicio->nombre ?? '-' }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Título</span>
                <span class="font-extrabold text-white text-lg">{{ $evento->titulo }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Descripción</span>
                <span class="text-gray-300 text-right">{{ $evento->descripcion }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Fecha evento</span>
                <span>{{ $evento->fecha_evento }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Ubicación</span>
                <span>{{ $evento->ubicacion }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Estado</span>
                <span>{{ ucfirst($evento->estado) }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Costo estimado</span>
                <span class="font-semibold">S/ {{ number_format($evento->costo_estimado, 2) }}</span>
            </div>
        </div>
        <div class="flex gap-2 mt-4">
            <a href="{{ route('eventos.edit', $evento) }}" class="btn">Editar</a>
            <a href="{{ route('eventos.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</x-layouts.app>
