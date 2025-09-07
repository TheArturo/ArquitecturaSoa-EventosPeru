<x-layouts.app :title="__('Crear servicio')">
    <div class="card" style="max-width: 500px; margin: 2rem auto;">
        <h1 class="title-xl mb-4">Crear servicio</h1>
        <form action="{{ route('servicios.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="block mb-1">Nombre</label>
                <input type="text" name="nombre" required value="{{ old('nombre') }}">
                @error('nombre')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-1">Descripción</label>
                <textarea name="descripcion">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-1">Precio base</label>
                <input type="number" step="0.01" name="precio_base" required value="{{ old('precio_base') }}">
                @error('precio_base')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-1">Duración estimada (min)</label>
                <input type="number" name="duracion_estimada_min" required value="{{ old('duracion_estimada_min') }}">
                @error('duracion_estimada_min')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-1">Estado</label>
                <select name="estado">
                    <option value="1" @if(old('estado')==1) selected @endif>Activo</option>
                    <option value="0" @if(old('estado')==0) selected @endif>Inactivo</option>
                </select>
                @error('estado')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn">Guardar</button>
        </form>
    </div>
</x-layouts.app>
