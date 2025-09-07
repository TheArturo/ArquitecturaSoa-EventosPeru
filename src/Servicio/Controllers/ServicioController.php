<?php
namespace App\Src\Servicio\Controllers;

use App\Src\Servicio\Repository\EloquentServicio;
use App\Src\Servicio\Validator\ServicioValidator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class ServicioController extends Controller
{
    protected $repo;
    public function __construct(EloquentServicio $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
    $servicios = \App\Src\Servicio\Models\Servicio::orderBy('created_at', 'desc')->paginate(10);
    return view('modulos.servicios.index', compact('servicios'));
    }

    public function create()
    {
        return view('modulos.servicios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'regex:/^[\pL\s]+$/u'],
            'descripcion' => 'required',
            'precio_base' => ['required', 'numeric'],
            'duracion_estimada_min' => ['required', 'integer'],
            'estado' => 'required',
        ], [
            'required' => 'Este campo es obligatorio.',
            'nombre.regex' => 'El nombre solo debe contener letras y espacios.',
            'precio_base.numeric' => 'El precio base debe ser un número.',
            'duracion_estimada_min.integer' => 'La duración debe ser un número entero.'
        ]);
        $servicio = $this->repo->create($request->all());
        return redirect()->route('servicios.index')->with('success', 'Servicio creado');
    }

    public function show($id)
    {
        $servicio = $this->repo->find($id);
        return view('modulos.servicios.show', compact('servicio'));
    }

    public function edit($id)
    {
        $servicio = $this->repo->find($id);
        return view('modulos.servicios.edit', compact('servicio'));
    }

    public function update(Request $request, $id)
    {
        $validator = ServicioValidator::validate($request->all());
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $servicio = $this->repo->update($id, $request->all());
        return redirect()->route('servicios.index')->with('success', 'Servicio actualizado');
    }

    public function destroy($id)
    {
        $this->repo->delete($id);
        return redirect()->route('servicios.index')->with('success', 'Servicio eliminado');
    }
}
