<?php
namespace App\Src\Evento\Controllers;

use App\Src\Evento\Repository\EloquentEvento;
use App\Src\Evento\Validator\EventoValidator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;

class EventoController extends Controller
{
    protected $repo;
    public function __construct(EloquentEvento $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        $estado = $request->get('estado');
        $query = \App\Src\Evento\Models\Evento::query();
        if ($estado) {
            $query->where('estado', $estado);
        }
        $query->orderBy('created_at', 'desc');
        $eventos = $query->paginate(10);
        return view('modulos.eventos.index', compact('eventos'));
    }

    public function create()
    {
        $clientes = app(\App\Src\Cliente\Repository\EloquentCliente::class)->paginate(100);
        $servicios = app(\App\Src\Servicio\Repository\EloquentServicio::class)->paginate(100);
        return view('modulos.eventos.create', compact('clientes', 'servicios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'cliente_id' => 'required',
            'servicio_id' => 'required',
            'fecha_evento' => 'required',
            'estado' => 'required',
        ], [
            'required' => 'Este campo es obligatorio.'
        ]);
        $evento = $this->repo->create($request->all());
        
        // Enviar notificación al cliente (si el cliente tiene email)
        $cliente = $evento->cliente;
        if ($cliente && $cliente->email) {
            try {
                \Illuminate\Support\Facades\Mail::to($cliente->email)
                    ->send(new \App\Mail\EventoCreado($evento));
            } catch (\Exception $e) {
                // Log silencioso si falla el envío
                Log::warning('No se pudo enviar email de evento creado: ' . $e->getMessage());
            }
        }
        
        return redirect()->route('eventos.index')->with('success', 'Evento creado correctamente');
    }

    public function show($id)
    {
        $evento = $this->repo->find((int)$id);
        return view('modulos.eventos.show', compact('evento'));
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
