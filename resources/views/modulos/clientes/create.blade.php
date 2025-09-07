<x-layouts.app :title="__('Crear cliente')">
    <div class="card" style="max-width: 500px; margin: 2rem auto;">
        <h1 class="title-xl mb-4">Crear cliente</h1>
        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="block mb-1">Nombre</label>
                <input type="text" name="nombre" maxlength="120" required value="{{ old('nombre') }}">
                @error('nombre')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-1">Documento</label>
                <input type="text" name="documento" value="{{ old('documento') }}">
                @error('documento')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-1">Teléfono</label>
                <input type="text" name="telefono" value="{{ old('telefono') }}">
                @error('telefono')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-1">Dirección</label>
                <input type="text" name="direccion" value="{{ old('direccion') }}">
                @error('direccion')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn">Guardar</button>
        </form>
    </div>
</x-layouts.app>
