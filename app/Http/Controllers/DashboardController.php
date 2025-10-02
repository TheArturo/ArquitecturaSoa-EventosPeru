<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Src\Evento\Models\Evento;
use App\Src\Cliente\Models\Cliente;
use App\Src\Proveedor\Models\Proveedor;
use App\Src\Reserva\Models\Reserva;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $totalEventos = Evento::count();
        $totalClientes = Cliente::count();
        $totalProveedores = Proveedor::count();
        $totalReservas = Reserva::count();

        $proximosEventos = Evento::orderBy('fecha_evento', 'asc')
            ->where('fecha_evento', '>=', now())
            ->take(5)
            ->get();

        return view('dashboard', [
            'totalEventos' => $totalEventos,
            'totalClientes' => $totalClientes,
            'totalProveedores' => $totalProveedores,
            'totalReservas' => $totalReservas,
            'proximosEventos' => $proximosEventos,
        ]);
    }
}
