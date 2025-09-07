<x-layouts.app :title="__('Agenda')">
    <div class="card" style="max-width: 900px; margin: 2rem auto;">
        <h1 class="title-xl mb-4">Agenda semanal de eventos</h1>
        <div class="flex flex-col gap-6">
            @foreach($eventos as $semana => $grupo)
                <div class="box shadow-lg p-6 rounded-xl bg-gradient-to-br from-gray-900 to-gray-800">
                    <div class="flex items-center mb-4">
                        <span class="text-2xl font-bold text-purple-400 mr-3">Semana {{ $semana }}</span>
                        <span class="badge badge-dark">{{ count($grupo) }} evento{{ count($grupo) > 1 ? 's' : '' }}</span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($grupo as $evento)
                        <div class="bg-gray-950 rounded-lg p-4 flex flex-col gap-2 border border-gray-800 hover:border-purple-500 transition">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="badge badge-info">{{ $evento->tipo_evento ?? '-' }}</span>
                                <span class="badge badge-dark">{{ $evento->cliente->nombre ?? '-' }}</span>
                                <span class="badge badge-dark">{{ $evento->servicio->nombre ?? '-' }}</span>
                                <span class="badge badge-{{ $evento->estado }}">{{ ucfirst($evento->estado) }}</span>
                            </div>
                            <div class="font-semibold text-lg text-white mb-1">
                                <i class="fa fa-calendar mr-1"></i> {{ $evento->titulo }}
                            </div>
                            <div class="text-sm text-gray-400 mb-1">
                                <i class="fa fa-clock mr-1"></i> {{ $evento->fecha_evento }}
                            </div>
                            <div class="flex gap-2 mt-2">
                                <a href="{{ route('eventos.show', $evento) }}" class="btn btn-xs">Ver detalle</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="agenda-paginacion">
            {{ $eventos->links() }}
        </div>
    </div>
</x-layouts.app>
