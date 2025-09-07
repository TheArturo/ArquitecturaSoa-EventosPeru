<?php
namespace App\Src\Calificacion\Validator;

use Illuminate\Support\Facades\Validator;

class CalificacionValidator
{
    public static function validate(array $data)
    {
        return Validator::make($data, [
            'evento_id' => 'required|exists:eventos,id',
            'proveedor_id' => 'required|exists:proveedores,id',
            'puntaje' => 'required|integer|min:1|max:5',
        ]);
    }
}
