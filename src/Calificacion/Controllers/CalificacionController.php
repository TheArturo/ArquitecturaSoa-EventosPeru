<?php
namespace App\Src\Calificacion\Controllers;

use App\Src\Calificacion\Repository\EloquentCalificacion;
use App\Src\Calificacion\Validator\CalificacionValidator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class CalificacionController extends Controller
{
    protected $repo;
    public function __construct(EloquentCalificacion $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
    $calificaciones = \App\Src\Calificacion\Models\Calificacion::orderBy('created_at', 'desc')->paginate(10);
    return view('modulos.calificaciones.index', compact('calificaciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => ['required', 'numeric'],
            'evento_id' => ['required', 'numeric'],
            'puntuacion' => ['required', 'numeric'],
            'comentario' => 'required',
        ], [
            'required' => 'Este campo es obligatorio.',
            'cliente_id.numeric' => 'El cliente debe ser válido.',
            'evento_id.numeric' => 'El evento debe ser válido.',
            'puntuacion.numeric' => 'La puntuación debe ser un número.'
        ]);
        $calificacion = $this->repo->create($request->all());
        return redirect()->route('calificaciones.index')->with('success', 'Calificación registrada');
    }
}
