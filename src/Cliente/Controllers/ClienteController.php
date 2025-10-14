<?php
namespace App\Src\Cliente\Controllers;

use App\Src\Cliente\Repository\EloquentCliente;
use App\Src\Cliente\Validator\ClienteValidator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class ClienteController extends Controller
{
    protected $repo;
    public function __construct(EloquentCliente $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
    $clientes = \App\Src\Cliente\Models\Cliente::orderBy('created_at', 'desc')->paginate(10);
    return view('modulos.clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('modulos.clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'regex:/^[\pL\s]+$/u'],
            'documento' => ['required', 'regex:/^[0-9]+$/'],
            'telefono' => ['required', 'regex:/^[0-9]+$/'],
            'email' => 'required|email',
            'direccion' => 'required',
        ], [
            'required' => 'Este campo es obligatorio.',
            'nombre.regex' => 'El nombre solo debe contener letras y espacios.',
            'documento.regex' => 'El documento solo debe contener números.',
            'telefono.regex' => 'El teléfono solo debe contener números.',
            'email.email' => 'El email debe ser válido.'
        ]);
        $cliente = $this->repo->create($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente creado');
    }

    public function show($id)
    {
        $cliente = $this->repo->find($id);
        return view('modulos.clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = $this->repo->find($id);
        return view('modulos.clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $validator = ClienteValidator::validate($request->all());
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $cliente = $this->repo->update($id, $request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado');
    }

    public function destroy($id)
    {
        $this->repo->delete($id);
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado');
    }
}
