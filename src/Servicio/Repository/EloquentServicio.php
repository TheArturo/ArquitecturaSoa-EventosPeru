<?php
namespace App\Src\Servicio\Repository;

use App\Src\Servicio\Models\Servicio;

class EloquentServicio
{
    public function paginate(int $perPage = 10)
    {
        return Servicio::paginate($perPage);
    }
    public function find(int $id)
    {
        return Servicio::findOrFail($id);
    }
    public function create(array $data)
    {
        return Servicio::create($data);
    }
    public function update(int $id, array $data)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->update($data);
        return $servicio;
    }
    public function delete(int $id)
    {
        $servicio = Servicio::findOrFail($id);
        return $servicio->delete();
    }
}
