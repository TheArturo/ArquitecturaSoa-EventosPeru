<?php
namespace App\Src\Cliente\Repository;

use App\Src\Cliente\Models\Cliente;

class EloquentCliente
{
    public function paginate(int $perPage = 10)
    {
        return Cliente::paginate($perPage);
    }
    public function find(int $id)
    {
        return Cliente::findOrFail($id);
    }
    public function create(array $data)
    {
        return Cliente::create($data);
    }
    public function update(int $id, array $data)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($data);
        return $cliente;
    }
    public function delete(int $id)
    {
        $cliente = Cliente::findOrFail($id);
        return $cliente->delete();
    }
}
