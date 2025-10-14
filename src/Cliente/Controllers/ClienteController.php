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
