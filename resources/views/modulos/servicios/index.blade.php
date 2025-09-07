<x-layouts.app :title="__('Servicios')">
    <div class="flex justify-between items-center mb-6">
        <h1 class="title-xl mb-0">Servicios</h1>
        <a href="{{ route('servicios.create') }}" class="btn">Crear servicio</a>
    </div>
    <div class="overflow-x-auto">
    <table class="table-dark" style="max-width: 900px; margin: 0 auto; width: 100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio base</th>
                    <th>Duración (min)</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($servicios as $servicio)
                    <tr>
                        <td>{{ $servicio->id }}</td>
                        <td>{{ $servicio->nombre }}</td>
                        <td>{{ $servicio->descripcion }}</td>
                        <td>{{ $servicio->precio_base }}</td>
                        <td>{{ $servicio->duracion_estimada_min }}</td>
                        <td>{{ $servicio->estado ? 'Activo' : 'Inactivo' }}</td>
                        <td class="flex gap-2">
                            <a href="{{ route('servicios.show', $servicio) }}" class="btn btn-sm">Ver</a>
                            <a href="{{ route('servicios.edit', $servicio) }}" class="btn btn-sm btn-secondary">Editar</a>
                            <form action="{{ route('servicios.destroy', $servicio) }}" method="POST" onsubmit="return confirm('¿Eliminar servicio?')" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $servicios->links() }}
    </div>
</x-layouts.app>
