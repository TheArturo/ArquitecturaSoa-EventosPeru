<?php
namespace App\Src\Servicio\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Servicio extends Model
{
    use HasFactory;
    protected $table = 'servicios';
    protected $fillable = [
        'nombre', 'descripcion', 'precio_base', 'duracion_estimada_min', 'estado'
    ];

    public function eventos(): HasMany
    {
        return $this->hasMany(\App\Src\Evento\Models\Evento::class, 'servicio_id');
    }

    /**
     * Enlaza la factory correcta para el modelo Servicio.
     */
    protected static function newFactory()
    {
        return \Database\Factories\ServicioFactory::new();
    }
}
