<?php
namespace App\Src\Agenda\Controllers;

use Illuminate\Routing\Controller;
use App\Src\Evento\Models\Evento;

class AgendaController extends Controller
{
    public function index()
    {
        $eventos = Evento::orderBy('fecha_evento')->get()->groupBy(function($evento) {
            return \Carbon\Carbon::parse($evento->fecha_evento)->format('W');
        });
        $semanas = $eventos->keys()->toArray();
        $page = request()->get('page', 1);
        $perPage = 4;
        $paginadas = array_slice($eventos->all(), ($page - 1) * $perPage, $perPage, true);
        $eventosPaginados = new \Illuminate\Pagination\LengthAwarePaginator(
            $paginadas,
            $eventos->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        return view('modulos.agenda.index', ['eventos' => $eventosPaginados]);
    }
}
