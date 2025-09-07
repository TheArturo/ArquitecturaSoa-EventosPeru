<x-layouts.app :title="__('Clientes')">
    <div class="flex justify-between items-center mb-6">
        <h1 class="title-xl mb-0">Clientes</h1>
        <a href="{{ route('clientes.create') }}" class="btn">Crear cliente</a>
    </div>
    <div class="overflow-x-auto">
    <table class="table-dark" style="max-width: 900px; margin: 0 auto; width: 100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->documento }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td class="flex gap-2">
                            <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-sm">Ver</a>
                            <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-sm btn-secondary">Editar</a>
                            <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" onsubmit="return confirm('¿Eliminar cliente?')" style="display:inline-block;">
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
        {{ $clientes->links() }}
    </div>
</x-layouts.app>
