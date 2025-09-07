<?php
namespace App\Src\Reserva\Validator;

use Illuminate\Support\Facades\Validator;

class ReservaValidator
{
    public static function validate(array $data)
    {
        return Validator::make($data, [
            'evento_id' => 'required|exists:eventos,id',
            'proveedor_id' => 'required|exists:proveedores,id',
            'fecha_reserva' => 'required|date',
        ]);
    }
}
