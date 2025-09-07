<x-layouts.app :title="__('Editar proveedor')">
    <div class="card" style="max-width: 500px; margin: 2rem auto;">
        <h1 class="title-xl mb-4">Editar proveedor</h1>
        <form action="{{ route('proveedores.update', $proveedor) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="block mb-1">Nombre comercial</label>
                <input type="text" name="nombre_comercial" maxlength="150" value="{{ $proveedor->nombre_comercial }}" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1">RUC</label>
                <input type="text" name="ruc" maxlength="11" value="{{ $proveedor->ruc }}">
            </div>
            <div class="mb-3">
                <label class="block mb-1">Contacto</label>
                <input type="text" name="contacto" value="{{ $proveedor->contacto }}">
            </div>
            <div class="mb-3">
                <label class="block mb-1">Teléfono</label>
                <input type="text" name="telefono" value="{{ $proveedor->telefono }}">
            </div>
            <div class="mb-3">
                <label class="block mb-1">Email</label>
                <input type="email" name="email" value="{{ $proveedor->email }}">
            </div>
            <div class="mb-3">
                <label class="block mb-1">Especialidad</label>
                <input type="text" name="especialidad" value="{{ $proveedor->especialidad }}">
            </div>
            <button type="submit" class="btn">Actualizar</button>
        </form>
    </div>
</x-layouts.app>
