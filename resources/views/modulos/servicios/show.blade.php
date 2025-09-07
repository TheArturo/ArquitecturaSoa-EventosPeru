<x-layouts.app :title="__('Detalle servicio')">
    <div class="card" style="max-width: 500px; margin: 2rem auto;">
        <h1 class="title-xl mb-4">Detalle del servicio</h1>
        <div class="divide-y divide-gray-800">
            <div class="flex items-center justify-between py-2">
                <span class="badge badge-dark">ID</span>
                <span class="font-bold text-lg">{{ $servicio->id }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="badge badge-info">Nombre</span>
                <span class="font-extrabold text-white text-lg">{{ $servicio->nombre }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Descripción</span>
                <span class="text-gray-300 text-right">{{ $servicio->descripcion }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Precio base</span>
                <span class="font-semibold">S/ {{ number_format($servicio->precio_base, 2) }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Duración estimada (min)</span>
                <span>{{ $servicio->duracion_estimada_min }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Estado</span>
                <span class="font-semibold">{{ $servicio->estado ? 'Activo' : 'Inactivo' }}</span>
            </div>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('servicios.edit', $servicio) }}" class="btn">Editar</a>
            <a href="{{ route('servicios.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</x-layouts.app>
