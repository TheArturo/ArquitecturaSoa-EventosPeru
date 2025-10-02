<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-4">
            <!-- Tarjeta resumen eventos -->
            <div
                class="flex flex-col items-center justify-center bg-white dark:bg-[#161615] rounded-xl border border-neutral-200 dark:border-neutral-700 shadow p-4">
                <img src="https://images.unsplash.com/photo-1515165562835-cf7747c2b6c8?auto=format&fit=crop&w=400&q=80"
                    alt="Eventos" class="w-16 h-16 object-cover rounded-full mb-2">
                <span class="text-2xl font-bold text-[#F53003]">{{ $totalEventos ?? '0' }}</span>
                <span class="text-sm text-gray-600 dark:text-gray-300">Eventos</span>
            </div>
            <!-- Tarjeta resumen clientes -->
            <div
                class="flex flex-col items-center justify-center bg-white dark:bg-[#161615] rounded-xl border border-neutral-200 dark:border-neutral-700 shadow p-4">
                <img src="https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?auto=format&fit=crop&w=400&q=80"
                    alt="Clientes" class="w-16 h-16 object-cover rounded-full mb-2">
                <span class="text-2xl font-bold text-[#1b1b18] dark:text-[#F61500]">{{ $totalClientes ?? '0' }}</span>
                <span class="text-sm text-gray-600 dark:text-gray-300">Clientes</span>
            </div>
            <!-- Tarjeta resumen proveedores -->
            <div
                class="flex flex-col items-center justify-center bg-white dark:bg-[#161615] rounded-xl border border-neutral-200 dark:border-neutral-700 shadow p-4">
                <img src="https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=400&q=80"
                    alt="Proveedores" class="w-16 h-16 object-cover rounded-full mb-2">
                <span
                    class="text-2xl font-bold text-[#1b1b18] dark:text-[#F61500]">{{ $totalProveedores ?? '0' }}</span>
                <span class="text-sm text-gray-600 dark:text-gray-300">Proveedores</span>
            </div>
            <!-- Tarjeta resumen reservas -->
            <div
                class="flex flex-col items-center justify-center bg-white dark:bg-[#161615] rounded-xl border border-neutral-200 dark:border-neutral-700 shadow p-4">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80"
                    alt="Reservas" class="w-16 h-16 object-cover rounded-full mb-2">
                <span class="text-2xl font-bold text-[#1b1b18] dark:text-[#F61500]">{{ $totalReservas ?? '0' }}</span>
                <span class="text-sm text-gray-600 dark:text-gray-300">Reservas</span>
            </div>
        </div>
        <!-- Tabla de próximos eventos -->
        <div
            class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-[#161615] shadow p-6">
            <h2 class="text-xl font-bold mb-4 text-[#F53003] dark:text-[#F61500]">Próximos eventos</h2>
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Título</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha
                        </th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Ubicación</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($proximosEventos ?? [] as $evento)
                        <tr class="hover:bg-[#fff2f2] dark:hover:bg-[#1D0002] transition">
                            <td class="px-4 py-2 font-semibold">{{ $evento->titulo }}</td>
                            <td class="px-4 py-2">
                                {{ \Carbon\Carbon::parse($evento->fecha_evento)->format('d/m/Y H:i') }}</td>
                            <td class="px-4 py-2">{{ $evento->ubicacion }}</td>
                            <td class="px-4 py-2">
                                <span
                                    class="inline-block px-2 py-1 rounded text-xs font-bold bg-gray-200 text-gray-700">
                                    {{ __(ucwords(str_replace('_', ' ', $evento->estado))) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-gray-400 py-6">No hay eventos próximos.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>
