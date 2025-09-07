<x-layouts.app :title="__('Crear evento')">
    <div class="card" style="max-width: 600px; margin: 2rem auto;">
        <h1 class="title-xl mb-4">Crear evento</h1>
        <form action="{{ route('eventos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="block mb-1">Cliente</label>
                <select name="cliente_id" required>
                    <option value="">Seleccione un cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Servicio</label>
                <select name="servicio_id" required>
                    <option value="">Seleccione un servicio</option>
                    @foreach($servicios as $servicio)
                        <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Tipo de evento</label>
                <select name="tipo_evento" required>
                    @foreach(\App\Src\Evento\Models\Evento::tiposEvento() as $tipo)
                        <option value="{{ $tipo }}">{{ $tipo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Título</label>
                <input type="text" name="titulo" maxlength="120" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Descripción</label>
                <textarea name="descripcion"></textarea>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Fecha evento</label>
                <input type="datetime-local" name="fecha_evento" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Ubicación</label>
                <input type="text" name="ubicacion">
            </div>
            <div class="mb-3">
                <label class="block mb-1">Estado</label>
                <select name="estado">
                    <option value="borrador">Borrador</option>
                    <option value="pendiente">Pendiente</option>
                    <option value="confirmado">Confirmado</option>
                    <option value="en_ejecucion">En ejecución</option>
                    <option value="cerrado">Cerrado</option>
                    <option value="cancelado">Cancelado</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Costo estimado</label>
                <input type="number" step="0.01" name="costo_estimado">
            </div>
            <button type="submit" class="btn">Guardar</button>
        </form>
    </div>
</x-layouts.app>
