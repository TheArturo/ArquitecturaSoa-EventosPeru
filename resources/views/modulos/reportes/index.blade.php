<x-layouts.app :title="__('Reportes Estadísticos')">
    <link rel="stylesheet" href="{{ asset('css/reportes.css') }}">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-[#F53003] dark:text-[#F61500]">Reportes Estadísticos</h1>
        <p class="text-gray-600 dark:text-gray-300">Análisis y métricas del sistema Eventos Perú</p>
    </div>

    <!-- Tarjetas de resumen -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white dark:bg-[#161615] rounded-xl border border-neutral-200 dark:border-neutral-700 shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Eventos</p>
                    <p class="text-3xl font-bold text-[#F53003] dark:text-[#F61500]">{{ $totalEventos }}</p>
                </div>
                <div class="text-4xl">📅</div>
            </div>
        </div>

        <div class="bg-white dark:bg-[#161615] rounded-xl border border-neutral-200 dark:border-neutral-700 shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Clientes</p>
                    <p class="text-3xl font-bold text-blue-600 dark:text-blue-400">{{ $totalClientes }}</p>
                </div>
                <div class="text-4xl">👥</div>
            </div>
        </div>

        <div class="bg-white dark:bg-[#161615] rounded-xl border border-neutral-200 dark:border-neutral-700 shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Proveedores</p>
                    <p class="text-3xl font-bold text-green-600 dark:text-green-400">{{ $totalProveedores }}</p>
                </div>
                <div class="text-4xl">💼</div>
            </div>
        </div>

        <div class="bg-white dark:bg-[#161615] rounded-xl border border-neutral-200 dark:border-neutral-700 shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Reservas</p>
                    <p class="text-3xl font-bold text-purple-600 dark:text-purple-400">{{ $totalReservas }}</p>
                </div>
                <div class="text-4xl">📋</div>
            </div>
        </div>
    </div>

    <!-- Gráficos y reportes -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <!-- Eventos por estado (gráfico compacto) -->
        <div class="bg-white dark:bg-[#161615] rounded-xl border border-neutral-200 dark:border-neutral-700 shadow p-6">
            <h3 class="text-xl font-bold mb-4 text-[#F53003] dark:text-[#F61500]">Eventos por Estado</h3>

            @if ($totalEventos > 0)
                <div class="flex flex-col md:flex-row md:items-center md:space-x-6">
                    <div class="w-full md:w-1/2 flex items-center justify-center p-2">
                        <div style="width:280px; height:280px;">
                            <canvas id="donutEventos" aria-label="Eventos por estado" role="img"></canvas>
                        </div>
                    </div>

                    <div id="legendDonut"
                        class="w-full md:w-1/2 p-2 space-y-2 text-sm text-gray-700 dark:text-gray-300"></div>
                </div>
            @else
                <div class="text-center py-8 text-gray-600 dark:text-gray-400">No hay eventos disponibles para mostrar
                    el gráfico.</div>
            @endif
        </div>

        <!-- Eventos por mes (gráfico de barras horizontales) -->
        <div class="bg-white dark:bg-[#161615] rounded-xl border border-neutral-200 dark:border-neutral-700 shadow p-6">
            <h3 class="text-xl font-bold mb-4 text-[#F53003] dark:text-[#F61500]">Eventos por Mes (Últimos 6 meses)</h3>

            @if ($eventosPorMes->isNotEmpty())
                <div class="p-2" style="min-height: 260px;">
                    <div style="width:100%; height:320px;">
                        <canvas id="barEventosMes" aria-label="Eventos por mes" role="img"></canvas>
                    </div>
                </div>
            @else
                <div class="text-center py-8 text-gray-600 dark:text-gray-400">No hay datos de eventos por mes para
                    mostrar.</div>
            @endif
        </div>
    </div>

    <!-- Top Clientes y Proveedores -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <!-- Top 5 Clientes -->
        <div class="bg-white dark:bg-[#161615] rounded-xl border border-neutral-200 dark:border-neutral-700 shadow p-6">
            <h3 class="text-xl font-bold mb-4 text-[#F53003] dark:text-[#F61500]">Top 5 Clientes</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b dark:border-gray-700">
                            <th class="text-left py-2 px-2 text-sm font-medium text-gray-500">Cliente</th>
                            <th class="text-right py-2 px-2 text-sm font-medium text-gray-500">Eventos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topClientes as $cliente)
                            <tr class="border-b dark:border-gray-800">
                                <td class="py-2 px-2">{{ $cliente->nombre }}</td>
                                <td class="text-right py-2 px-2 font-bold text-[#F53003] dark:text-[#F61500]">
                                    {{ $cliente->eventos_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Top 5 Proveedores -->
        <div class="bg-white dark:bg-[#161615] rounded-xl border border-neutral-200 dark:border-neutral-700 shadow p-6">
            <h3 class="text-xl font-bold mb-4 text-[#F53003] dark:text-[#F61500]">Top 5 Proveedores</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b dark:border-gray-700">
                            <th class="text-left py-2 px-2 text-sm font-medium text-gray-500">Proveedor</th>
                            <th class="text-right py-2 px-2 text-sm font-medium text-gray-500">Reservas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topProveedores as $proveedor)
                            <tr class="border-b dark:border-gray-800">
                                <td class="py-2 px-2">{{ $proveedor->nombre_comercial }}</td>
                                <td class="text-right py-2 px-2 font-bold text-green-600 dark:text-green-400">
                                    {{ $proveedor->reservas_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Ingresos estimados -->
    <div class="bg-white dark:bg-[#161615] rounded-xl border border-neutral-200 dark:border-neutral-700 shadow p-6">
        <h3 class="text-xl font-bold mb-4 text-[#F53003] dark:text-[#F61500]">Ingresos Estimados por Mes</h3>
        <div class="space-y-3">
            @foreach ($ingresosPorMes as $mes)
                <div>
                    <div class="flex justify-between mb-1">
                        <span
                            class="text-sm font-medium">{{ \Carbon\Carbon::parse($mes->mes . '-01')->format('M Y') }}</span>
                        <span class="text-sm font-bold text-green-600 dark:text-green-400">S/
                            {{ number_format($mes->total_ingresos, 2) }}</span>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                        <div class="bg-green-600 dark:bg-green-400 h-2 rounded-full"
                            style="width: {{ ($mes->total_ingresos / $ingresosPorMes->max('total_ingresos')) * 100 }}%">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4 pt-4 border-t dark:border-gray-700">
            <div class="flex justify-between items-center">
                <span class="font-bold">Total Estimado:</span>
                <span class="text-2xl font-bold text-green-600 dark:text-green-400">S/
                    {{ number_format($ingresosPorMes->sum('total_ingresos'), 2) }}</span>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            // Datos para el inicializador de reportes
            window.__REPORTS_DATA = window.__REPORTS_DATA || {};
            window.__REPORTS_DATA.eventosPorEstado = @json($eventosPorEstado);
            window.__REPORTS_DATA.eventosPorMes = @json(
                $eventosPorMes->map(function ($m) {
                    return ['mes' => \Carbon\Carbon::parse($m->mes . '-01')->format('M Y'), 'total' => $m->total];
                }));
            window.__REPORTS_DATA.totalEventos = {{ $totalEventos ?? 0 }};
        </script>
        <script src="{{ asset('js/reportes.js') }}"></script>
    @endpush

</x-layouts.app>
