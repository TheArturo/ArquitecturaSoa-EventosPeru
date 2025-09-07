<?php
namespace App\Src\Proveedor\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proveedor extends Model
{
    use HasFactory;
    protected $table = 'proveedores';
    protected $fillable = [
        'nombre_comercial', 'ruc', 'contacto', 'telefono', 'email', 'especialidad', 'calificacion_promedio'
    ];

    public function reservas(): HasMany
    {
        return $this->hasMany(\App\Src\Reserva\Models\Reserva::class, 'proveedor_id');
    }

    public function calificaciones(): HasMany
    {
        return $this->hasMany(\App\Src\Calificacion\Models\Calificacion::class, 'proveedor_id');
    }

    /**
     * Enlaza la factory correcta para el modelo Proveedor.
     */
    protected static function newFactory()
    {
        return \Database\Factories\ProveedorFactory::new();
    }
}
