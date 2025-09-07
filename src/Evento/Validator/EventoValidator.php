<?php
namespace App\Src\Evento\Validator;

use Illuminate\Support\Facades\Validator;

class EventoValidator
{
    public static function validate(array $data)
    {
        return Validator::make($data, [
            'titulo' => 'required|max:120',
            'cliente_id' => 'required|exists:clientes,id',
            'servicio_id' => 'required|exists:servicios,id',
            'fecha_evento' => 'required|date|after:now',
            'estado' => 'required|in:borrador,pendiente,confirmado,en_ejecucion,cerrado,cancelado',
        ]);
    }
}
