<?php
namespace App\Src\Proveedor\Controllers;

use App\Src\Proveedor\Repository\EloquentProveedor;
use App\Src\Proveedor\Validator\ProveedorValidator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class ProveedorController extends Controller
{
    protected $repo;
    public function __construct(EloquentProveedor $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
    $proveedores = \App\Src\Proveedor\Models\Proveedor::orderBy('created_at', 'desc')->paginate(10);
    return view('modulos.proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('modulos.proveedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_comercial' => ['required', 'regex:/^[\pL\s]+$/u'],
            'ruc' => ['required', 'regex:/^[0-9]+$/'],
            'contacto' => ['required', 'regex:/^[\pL\s]+$/u'],
            'telefono' => ['required', 'regex:/^[0-9]+$/'],
            'email' => 'required|email',
            'especialidad' => 'required',
        ], [
            'required' => 'Este campo es obligatorio.',
            'nombre_comercial.regex' => 'El nombre comercial solo debe contener letras y espacios.',
            'ruc.regex' => 'El RUC solo debe contener números.',
            'contacto.regex' => 'El contacto solo debe contener letras y espacios.',
            'telefono.regex' => 'El teléfono solo debe contener números.',
            'email.email' => 'El email debe ser válido.'
        ]);
        $proveedor = $this->repo->create($request->all());
        return redirect()->route('proveedores.index')->with('success', 'Proveedor creado');
    }

    public function show($id)
    {
        $proveedor = $this->repo->find($id);
        return view('modulos.proveedores.show', compact('proveedor'));
    }

    public function edit($id)
    {
        $proveedor = $this->repo->find($id);
        return view('modulos.proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, $id)
    {
        $validator = ProveedorValidator::validate($request->all());
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $proveedor = $this->repo->update($id, $request->all());
        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado');
    }

    public function destroy($id)
    {
        $this->repo->delete($id);
        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado');
    }
}
