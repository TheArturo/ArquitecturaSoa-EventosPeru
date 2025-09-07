<?php
namespace App\Src\Evento\Repository;

use App\Src\Evento\Models\Evento;

class EloquentEvento
{
    public function paginate(int $perPage = 10)
    {
        return Evento::paginate($perPage);
    }
    public function find(int $id)
    {
        return Evento::findOrFail($id);
    }
    public function create(array $data)
    {
        return Evento::create($data);
    }
    public function update(int $id, array $data)
    {
        $evento = Evento::findOrFail($id);
        $evento->update($data);
        return $evento;
    }
    public function delete(int $id)
    {
        $evento = Evento::findOrFail($id);
        return $evento->delete();
    }
}
