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
