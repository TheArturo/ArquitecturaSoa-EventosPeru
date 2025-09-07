<?php
namespace App\Src\Reserva\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reserva extends Model
{
    use HasFactory;
    protected $table = 'reservas';
    protected $fillable = [
        'evento_id', 'proveedor_id', 'fecha_reserva', 'estado'
    ];

    public function evento(): BelongsTo
    {
        return $this->belongsTo(\App\Src\Evento\Models\Evento::class, 'evento_id');
    }

    public function proveedor(): BelongsTo
    {
        return $this->belongsTo(\App\Src\Proveedor\Models\Proveedor::class, 'proveedor_id');
    }

    /**
     * Enlaza la factory correcta para el modelo Reserva.
     */
    protected static function newFactory()
    {
        return \Database\Factories\ReservaFactory::new();
    }
}
