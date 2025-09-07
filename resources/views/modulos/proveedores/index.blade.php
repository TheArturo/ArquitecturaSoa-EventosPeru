<x-layouts.app :title="__('Proveedores')">
    <div class="flex justify-between items-center mb-6">
        <h1 class="title-xl mb-0">Proveedores</h1>
        <a href="{{ route('proveedores.create') }}" class="btn">Crear proveedor</a>
    </div>
    <div class="overflow-x-auto">
    <table class="table-dark w-full" style="min-width: 900px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre comercial</th>
                    <th>RUC</th>
                    <th>Contacto</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Especialidad</th>
                    <th>Calificación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proveedores as $proveedor)
                    <tr>
                        <td>{{ $proveedor->id }}</td>
                        <td>{{ $proveedor->nombre_comercial }}</td>
                        <td>{{ $proveedor->ruc }}</td>
                        <td>{{ $proveedor->contacto }}</td>
                        <td>{{ $proveedor->telefono }}</td>
                        <td>{{ $proveedor->email }}</td>
                        <td>{{ $proveedor->especialidad }}</td>
                        <td>{{ $proveedor->calificacion_promedio }}</td>
                        <td class="flex gap-2">
                            <a href="{{ route('proveedores.show', $proveedor) }}" class="btn btn-sm">Ver</a>
                            <a href="{{ route('proveedores.edit', $proveedor) }}" class="btn btn-sm btn-secondary">Editar</a>
                            <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST" onsubmit="return confirm('¿Eliminar proveedor?')" style="display:inline-block;">
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
        {{ $proveedores->links() }}
    </div>
</x-layouts.app>
