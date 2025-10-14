<?php
namespace App\Src\Evento\Controllers;

use App\Src\Evento\Repository\EloquentEvento;
use App\Src\Evento\Validator\EventoValidator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class EventoController extends Controller
{
    protected $repo;
    public function __construct(EloquentEvento $repo)
    {
        $this->repo = $repo;
    }

    

    public function edit($id)
    {
    $evento = $this->repo->find($id);
    $clientes = app(\App\Src\Cliente\Repository\EloquentCliente::class)->paginate(100);
    $servicios = app(\App\Src\Servicio\Repository\EloquentServicio::class)->paginate(100);
    return view('modulos.eventos.edit', compact('evento', 'clientes', 'servicios'));
    }

    public function update(Request $request, $id)
    {
        $validator = EventoValidator::validate($request->all());
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $evento = $this->repo->update($id, $request->all());
        return redirect()->route('eventos.index')->with('success', 'Evento actualizado');
    }

    public function destroy($id)
    {
        $this->repo->delete($id);
        return redirect()->route('eventos.index')->with('success', 'Evento eliminado');
    }

    public function pendientes(Request $request)
    {
        $query = \App\Src\Evento\Models\Evento::query()
            ->where('estado', 'pendiente')
            ->orWhere('fecha_evento', '>=', now());
        $eventos = $query->get();
        if ($request->wantsJson()) {
            return response()->json($eventos);
        }
        return view('modulos.eventos.pendientes', compact('eventos'));
    }
}
