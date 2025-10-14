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
