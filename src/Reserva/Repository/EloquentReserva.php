<?php
namespace App\Src\Reserva\Repository;

use App\Src\Reserva\Models\Reserva;

class EloquentReserva
{
    public function paginate(int $perPage = 10)
    {
        return Reserva::paginate($perPage);
    }
    public function find(int $id)
    {
        return Reserva::findOrFail($id);
    }
    public function create(array $data)
    {
        return Reserva::create($data);
    }
    public function update(int $id, array $data)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->update($data);
        return $reserva;
    }
    public function delete(int $id)
    {
        $reserva = Reserva::findOrFail($id);
        return $reserva->delete();
    }
}
