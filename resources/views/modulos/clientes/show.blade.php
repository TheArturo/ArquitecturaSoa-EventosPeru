<x-layouts.app :title="__('Detalle cliente')">
    <div class="card shadow-lg" style="max-width: 520px; margin: 2rem auto;">
        <h1 class="title-xl mb-6 text-center">Detalle del cliente</h1>
        <div class="divide-y divide-gray-800">
            <div class="flex items-center justify-between py-2">
                <span class="badge badge-dark">ID</span>
                <span class="font-bold text-lg">{{ $cliente->id }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="badge badge-info">Nombre</span>
                <span class="font-extrabold text-white text-lg">{{ $cliente->nombre }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Documento</span>
                <span>{{ $cliente->documento }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Teléfono</span>
                <span>{{ $cliente->telefono }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Email</span>
                <span>{{ $cliente->email }}</span>
            </div>
            <div class="flex items-center justify-between py-2">
                <span class="font-semibold text-gray-400">Dirección</span>
                <span class="text-gray-300 text-right">{{ $cliente->direccion }}</span>
            </div>
        </div>
            <div class="flex gap-3 justify-center mt-6">
            <a href="{{ route('clientes.edit', $cliente) }}" class="btn">Editar</a>
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</x-layouts.app>