<x-layouts.app :title="__('Editar evento')">
    <div class="card" style="max-width: 600px; margin: 2rem auto;">
        <h1 class="title-xl mb-4">Editar evento</h1>
        <form action="{{ route('eventos.update', $evento) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="block mb-1">Cliente</label>
                <select name="cliente_id" required>
                    <option value="">Seleccione un cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" @if($evento->cliente_id == $cliente->id) selected @endif>{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Servicio</label>
                <select name="servicio_id" required>
                    <option value="">Seleccione un servicio</option>
                    @foreach($servicios as $servicio)
                        <option value="{{ $servicio->id }}" @if($evento->servicio_id == $servicio->id) selected @endif>{{ $servicio->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Tipo de evento</label>
                <select name="tipo_evento" required>
                    @foreach(\App\Src\Evento\Models\Evento::tiposEvento() as $tipo)
                        <option value="{{ $tipo }}" @if($evento->tipo_evento == $tipo) selected @endif>{{ $tipo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Título</label>
                <input type="text" name="titulo" maxlength="120" value="{{ $evento->titulo }}" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Descripción</label>
                <textarea name="descripcion">{{ $evento->descripcion }}</textarea>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Fecha evento</label>
                <input type="datetime-local" name="fecha_evento" value="{{ $evento->fecha_evento }}" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Ubicación</label>
                <input type="text" name="ubicacion" value="{{ $evento->ubicacion }}">
            </div>
            <div class="mb-3">
                <label class="block mb-1">Estado</label>
                <select name="estado">
                    <option value="borrador" @if($evento->estado=='borrador') selected @endif>Borrador</option>
                    <option value="pendiente" @if($evento->estado=='pendiente') selected @endif>Pendiente</option>
                    <option value="confirmado" @if($evento->estado=='confirmado') selected @endif>Confirmado</option>
                    <option value="en_ejecucion" @if($evento->estado=='en_ejecucion') selected @endif>En ejecución</option>
                    <option value="cerrado" @if($evento->estado=='cerrado') selected @endif>Cerrado</option>
                    <option value="cancelado" @if($evento->estado=='cancelado') selected @endif>Cancelado</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Costo estimado</label>
                <input type="number" step="0.01" name="costo_estimado" value="{{ $evento->costo_estimado }}">
            </div>
            <button type="submit" class="btn">Actualizar</button>
        </form>
    </div>
</x-layouts.app>
