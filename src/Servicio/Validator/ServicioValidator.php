<?php
namespace App\Src\Servicio\Validator;

use Illuminate\Support\Facades\Validator;

class ServicioValidator
{
    public static function validate(array $data)
    {
        return Validator::make($data, [
            'nombre' => 'required|unique:servicios,nombre',
            'precio_base' => 'required|numeric|min:0',
            'estado' => 'boolean',
        ]);
    }
}
