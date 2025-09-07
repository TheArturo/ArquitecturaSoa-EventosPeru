<x-layouts.app :title="__('Calificaciones')">
    <div class="card" style="max-width: 900px; margin: 2rem auto;">
        <h1 class="title-xl mb-4">Calificaciones</h1>
        <div class="overflow-x-auto">
            <table class="table-dark" style="max-width: 900px; margin: 0 auto; width: 100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Evento</th>
                        <th>Proveedor</th>
                        <th>Puntaje</th>
                        <th>Comentario</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($calificaciones as $calificacion)
                        <tr>
                            <td>{{ $calificacion->id }}</td>
                            <td>{{ $calificacion->evento->titulo ?? '-' }}</td>
                            <td>{{ $calificacion->proveedor->nombre_comercial ?? '-' }}</td>
                            <td>{{ $calificacion->puntaje }}</td>
                            <td>{{ $calificacion->comentario }}</td>
                            <td>{{ $calificacion->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $calificaciones->links() }}
        </div>
    </div>
</x-layouts.app>
