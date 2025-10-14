<?php
namespace App\Src\Reserva\Controllers;

    use App\Src\Reserva\Repository\EloquentReserva;
    use App\Src\Reserva\Validator\ReservaValidator;
    use Illuminate\Http\Request;
    use Illuminate\Routing\Controller;
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\Support\Facades\View;

    class ReservaController extends Controller
    {
    protected $repo;
    public function __construct(EloquentReserva $repo)
    {
        $this->repo = $repo;
    }

   

    public function destroy($id)
    {
        $this->repo->delete($id);
        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada');
    }

    public function edit($id)
    {
        $reserva = $this->repo->find($id);
        $eventos = app(\App\Src\Evento\Repository\EloquentEvento::class)->paginate(100);
        $proveedores = app(\App\Src\Proveedor\Repository\EloquentProveedor::class)->paginate(100);
        return view('modulos.reservas.edit', compact('reserva', 'eventos', 'proveedores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'evento_id' => ['required', 'numeric'],
            'proveedor_id' => ['required', 'numeric'],
            'fecha_reserva' => ['required', 'date'],
            'estado' => 'required',
        ], [
            'required' => 'Este campo es obligatorio.',
            'evento_id.numeric' => 'El evento debe ser válido.',
            'proveedor_id.numeric' => 'El proveedor debe ser válido.',
            'fecha_reserva.date' => 'La fecha debe ser válida.'
        ]);
        $this->repo->update($id, $request->all());
        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada');
    }
}
