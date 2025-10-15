<?php
namespace App\Http\Controllers;

use App\Src\Evento\Models\Evento;
use App\Src\Cliente\Models\Cliente;
use App\Src\Proveedor\Models\Proveedor;
use App\Src\Reserva\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{
    public function index()
    {
        // Estadísticas generales
        $totalEventos = Evento::count();
        $totalClientes = Cliente::count();
        $totalProveedores = Proveedor::count();
        $totalReservas = Reserva::count();

        // Eventos por estado
        $eventosPorEstado = Evento::select('estado', DB::raw('count(*) as total'))
            ->groupBy('estado')
            ->get()
            ->pluck('total', 'estado');

        // Eventos por mes (últimos 6 meses)
        $eventosPorMes = Evento::select(
            DB::raw('DATE_FORMAT(fecha_evento, "%Y-%m") as mes'),
            DB::raw('count(*) as total')
        )
            ->where('fecha_evento', '>=', now()->subMonths(6))
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        // Top 5 clientes con más eventos
        $topClientes = Cliente::withCount('eventos')
            ->orderBy('eventos_count', 'desc')
            ->take(5)
            ->get();

        // Ingresos estimados por mes
        $ingresosPorMes = Evento::select(
            DB::raw('DATE_FORMAT(fecha_evento, "%Y-%m") as mes'),
            DB::raw('SUM(costo_estimado) as total_ingresos')
        )
            ->where('fecha_evento', '>=', now()->subMonths(6))
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        // Proveedores más solicitados
        $topProveedores = Proveedor::withCount('reservas')
            ->orderBy('reservas_count', 'desc')
            ->take(5)
            ->get();

        return view('modulos.reportes.index', compact(
            'totalEventos',
            'totalClientes',
            'totalProveedores',
            'totalReservas',
            'eventosPorEstado',
            'eventosPorMes',
            'topClientes',
            'ingresosPorMes',
            'topProveedores'
        ));
    }
}
