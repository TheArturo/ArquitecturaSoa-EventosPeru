<x-layouts.app :title="__('Eventos')">
    <div class="flex justify-between items-center mb-6">
        <h1 class="title-xl mb-0">Eventos</h1>
        <a href="{{ route('eventos.create') }}" class="btn">Crear evento</a>
    </div>
    <form method="GET" class="mb-6 flex gap-4 flex-wrap">
        <select name="estado" class="form-control">
            <option value="">Todos los estados</option>
            <option value="borrador">Borrador</option>
            <option value="pendiente">Pendiente</option>
            <option value="confirmado">Confirmado</option>
            <option value="en_ejecucion">En ejecución</option>
            <option value="cerrado">Cerrado</option>
            <option value="cancelado">Cancelado</option>
        </select>
    <!-- Botón de pendientes/próximos eliminado -->
        <button type="submit" class="btn btn-secondary">Filtrar</button>
    </form>
    <div class="overflow-x-auto">
    <table class="table-dark" style="max-width: 900px; margin: 0 auto; width: 100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Servicio</th>
                    <th>Fecha evento</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventos as $evento)
                    <tr>
                        <td>{{ $evento->id }}</td>
                        <td>{{ $evento->cliente->nombre ?? '-' }}</td>
                        <td>{{ $evento->servicio->nombre ?? '-' }}</td>
                        <td>{{ $evento->fecha_evento }}</td>
                        <td>{{ ucfirst($evento->estado) }}</td>
                        <td class="flex gap-2">
                            <a href="{{ route('eventos.show', $evento) }}" class="btn btn-sm">Ver</a>
                            <a href="{{ route('eventos.edit', $evento) }}" class="btn btn-sm btn-secondary">Editar</a>
                            <form action="{{ route('eventos.destroy', $evento) }}" method="POST" onsubmit="return confirm('¿Eliminar evento?')" style="display:inline-block;">
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
        {{ $eventos->links() }}
    </div>
</x-layouts.app>
