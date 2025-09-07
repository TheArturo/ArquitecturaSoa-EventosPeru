<?php
namespace App\Src\Calificacion\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Calificacion extends Model
{
    use HasFactory;
    protected $table = 'calificaciones';
    protected $fillable = [
        'evento_id', 'proveedor_id', 'puntaje', 'comentario'
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
     * Enlaza la factory correcta para el modelo Calificacion.
     */
    protected static function newFactory()
    {
        return \Database\Factories\CalificacionFactory::new();
    }
}
