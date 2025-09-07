<?php
namespace App\Src\Cliente\Validator;

use Illuminate\Support\Facades\Validator;

class ClienteValidator
{
    public static function validate(array $data)
    {
        return Validator::make($data, [
            'nombre' => 'required|max:120',
            'email' => 'nullable|email',
        ]);
    }
}
