<?php
namespace App\Src\Proveedor\Repository;

use App\Src\Proveedor\Models\Proveedor;

class EloquentProveedor
{
    public function paginate(int $perPage = 10)
    {
        return Proveedor::paginate($perPage);
    }
    public function find(int $id)
    {
        return Proveedor::findOrFail($id);
    }
    public function create(array $data)
    {
        return Proveedor::create($data);
    }
    public function update(int $id, array $data)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($data);
        return $proveedor;
    }
    public function delete(int $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return $proveedor->delete();
    }
}
