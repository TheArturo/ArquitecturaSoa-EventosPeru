<?php
namespace App\Src\Proveedor\Validator;

use Illuminate\Support\Facades\Validator;

class ProveedorValidator
{
    public static function validate(array $data)
    {
        return Validator::make($data, [
            'nombre_comercial' => 'required|max:150',
            'ruc' => 'nullable|size:11',
            'email' => 'nullable|email',
        ]);
    }
}
