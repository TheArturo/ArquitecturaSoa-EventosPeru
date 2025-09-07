<x-layouts.app :title="__('Editar servicio')">
    <div class="card" style="max-width: 500px; margin: 2rem auto;">
        <h1 class="title-xl mb-4">Editar servicio</h1>
        <form action="{{ route('servicios.update', $servicio) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="block mb-1">Nombre</label>
                <input type="text" name="nombre" value="{{ $servicio->nombre }}" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Descripción</label>
                <textarea name="descripcion">{{ $servicio->descripcion }}</textarea>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Precio base</label>
                <input type="number" step="0.01" name="precio_base" value="{{ $servicio->precio_base }}" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Duración estimada (min)</label>
                <input type="number" name="duracion_estimada_min" value="{{ $servicio->duracion_estimada_min }}" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Estado</label>
                <select name="estado">
                    <option value="1" @if($servicio->estado) selected @endif>Activo</option>
                    <option value="0" @if(!$servicio->estado) selected @endif>Inactivo</option>
                </select>
            </div>
            <button type="submit" class="btn">Actualizar</button>
        </form>
    </div>
</x-layouts.app>
