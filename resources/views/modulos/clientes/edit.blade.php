<x-layouts.app :title="__('Editar cliente')">
    <div class="card" style="max-width: 500px; margin: 2rem auto;">
        <h1 class="title-xl mb-4">Editar cliente</h1>
        <form action="{{ route('clientes.update', $cliente) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="block mb-1">Nombre</label>
                <input type="text" name="nombre" maxlength="120" value="{{ $cliente->nombre }}" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Documento</label>
                <input type="text" name="documento" value="{{ $cliente->documento }}">
            </div>
            <div class="mb-3">
                <label class="block mb-1">Teléfono</label>
                <input type="text" name="telefono" value="{{ $cliente->telefono }}">
            </div>
            <div class="mb-3">
                <label class="block mb-1">Email</label>
                <input type="email" name="email" value="{{ $cliente->email }}">
            </div>
            <div class="mb-3">
                <label class="block mb-1">Dirección</label>
                <input type="text" name="direccion" value="{{ $cliente->direccion }}">
            </div>
            <button type="submit" class="btn">Actualizar</button>
        </form>
    </div>
</x-layouts.app>
