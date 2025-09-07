<?php
namespace App\Src\Calificacion\Repository;

use App\Src\Calificacion\Models\Calificacion;

class EloquentCalificacion
{
    public function paginate(int $perPage = 10)
    {
        return Calificacion::paginate($perPage);
    }
    public function find(int $id)
    {
        return Calificacion::findOrFail($id);
    }
    public function create(array $data)
    {
        return Calificacion::create($data);
    }
    public function update(int $id, array $data)
    {
        $calificacion = Calificacion::findOrFail($id);
        $calificacion->update($data);
        return $calificacion;
    }
    public function delete(int $id)
    {
        $calificacion = Calificacion::findOrFail($id);
        return $calificacion->delete();
    }
}
