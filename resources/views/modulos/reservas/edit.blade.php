<x-layouts.app :title="__('Editar reserva')">
    <div class="card" style="max-width: 500px; margin: 2rem auto;">
        <h1 class="title-xl mb-4">Editar reserva</h1>
        <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="block mb-1">Evento</label>
                <select name="evento_id" required>
                    <option value="">Seleccione un evento</option>
                    @foreach($eventos as $evento)
                        <option value="{{ $evento->id }}" @if(old('evento_id', $reserva->evento_id)==$evento->id) selected @endif>{{ $evento->titulo }}</option>
                    @endforeach
                </select>
                @error('evento_id')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-1">Proveedor</label>
                <select name="proveedor_id" required>
                    <option value="">Seleccione un proveedor</option>
                    @foreach($proveedores as $proveedor)
                        <option value="{{ $proveedor->id }}" @if(old('proveedor_id', $reserva->proveedor_id)==$proveedor->id) selected @endif>{{ $proveedor->nombre_comercial }}</option>
                    @endforeach
                </select>
                @error('proveedor_id')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-1">Fecha reserva</label>
                <input type="datetime-local" name="fecha_reserva" required value="{{ old('fecha_reserva', $reserva->fecha_reserva) }}">
                @error('fecha_reserva')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-1">Estado</label>
                <select name="estado">
                    <option value="asignado" @if(old('estado', $reserva->estado)=='asignado') selected @endif>Asignado</option>
                    <option value="confirmado" @if(old('estado', $reserva->estado)=='confirmado') selected @endif>Confirmado</option>
                    <option value="rechazado" @if(old('estado', $reserva->estado)=='rechazado') selected @endif>Rechazado</option>
                    <option value="cancelado" @if(old('estado', $reserva->estado)=='cancelado') selected @endif>Cancelado</option>
                </select>
                @error('estado')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn">Actualizar</button>
        </form>
    </div>
</x-layouts.app>
