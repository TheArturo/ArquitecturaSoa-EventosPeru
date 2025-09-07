<x-layouts.app :title="__('Detalle proveedor')">
    <div class="card" style="max-width: 500px; margin: 2rem auto;">
        <h1 class="title-xl mb-4">Detalle del proveedor</h1>
        <div class="mb-2"><span class="font-semibold">ID:</span> <span>{{ $proveedor->id }}</span></div>
        <div class="mb-2"><span class="font-semibold">Nombre comercial:</span> <span>{{ $proveedor->nombre_comercial }}</span></div>
        <div class="mb-2"><span class="font-semibold">RUC:</span> <span>{{ $proveedor->ruc }}</span></div>
        <div class="mb-2"><span class="font-semibold">Contacto:</span> <span>{{ $proveedor->contacto }}</span></div>
        <div class="mb-2"><span class="font-semibold">Teléfono:</span> <span>{{ $proveedor->telefono }}</span></div>
        <div class="mb-2"><span class="font-semibold">Email:</span> <span>{{ $proveedor->email }}</span></div>
        <div class="divide-y divide-gray-800">
            <div class="flex items-center justify-between py-2">
                <span class="badge badge-dark">ID</span>
                <span class="font-bold text-lg">{{ $proveedor->id }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="badge badge-info">Nombre comercial</span>
                <span class="font-extrabold text-white text-lg">{{ $proveedor->nombre_comercial }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">RUC</span>
                <span>{{ $proveedor->ruc }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Contacto</span>
                <span>{{ $proveedor->contacto }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Teléfono</span>
                <span>{{ $proveedor->telefono }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Email</span>
                <span>{{ $proveedor->email }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Especialidad</span>
                <span>{{ $proveedor->especialidad }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Calificación promedio</span>
                <span>{{ $proveedor->calificacion_promedio }}</span>
            </div>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('proveedores.edit', $proveedor) }}" class="btn">Editar</a>
            <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</x-layouts.app>
