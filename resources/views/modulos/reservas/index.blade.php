<x-layouts.app :title="__('Reservas')">
    <div class="flex justify-between items-center mb-6">
        <h1 class="title-xl mb-0">Reservas</h1>
        <a href="{{ route('reservas.create') }}" class="btn">Crear reserva</a>
    </div>
    <div class="overflow-x-auto">
    <table class="table-dark" style="max-width: 900px; margin: 0 auto; width: 100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Evento</th>
                    <th>Proveedor</th>
                    <th>Fecha reserva</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $reserva)
                    <tr>
                        <td>{{ $reserva->id }}</td>
                        <td>{{ $reserva->evento->titulo ?? '-' }}</td>
                        <td>{{ $reserva->proveedor->nombre_comercial ?? '-' }}</td>
                        <td>{{ $reserva->fecha_reserva }}</td>
                        <td>{{ ucfirst($reserva->estado) }}</td>
                        <td class="flex gap-2">
                            <a href="{{ route('reservas.show', $reserva) }}" class="btn btn-sm">Ver</a>
                            <a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-sm btn-secondary">Editar</a>
                            <form action="{{ route('reservas.destroy', $reserva) }}" method="POST" onsubmit="return confirm('¿Eliminar reserva?')" style="display:inline-block;">
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
        {{ $reservas->links() }}
    </div>
</x-layouts.app>
