<x-layouts.app :title="__('Crear proveedor')">
    <div class="card" style="max-width: 500px; margin: 2rem auto;">
        <h1 class="title-xl mb-4">Crear proveedor</h1>
        <form action="{{ route('proveedores.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="block mb-1">Nombre comercial</label>
                <input type="text" name="nombre_comercial" maxlength="150" required value="{{ old('nombre_comercial') }}">
                @error('nombre_comercial')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-1">RUC</label>
                <input type="text" name="ruc" maxlength="11" value="{{ old('ruc') }}">
                @error('ruc')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-1">Contacto</label>
                <input type="text" name="contacto" value="{{ old('contacto') }}">
                @error('contacto')
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
                <label class="block mb-1">Especialidad</label>
                <input type="text" name="especialidad" value="{{ old('especialidad') }}">
                @error('especialidad')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn">Guardar</button>
        </form>
    </div>
</x-layouts.app>
