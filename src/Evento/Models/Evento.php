<?php
namespace App\Src\Evento\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Evento extends Model
{
    use HasFactory;
    protected $table = 'eventos';
    protected $fillable = [
        'cliente_id', 'servicio_id', 'tipo_evento', 'titulo', 'descripcion', 'fecha_evento', 'ubicacion', 'estado', 'costo_estimado'
    ];

    public static function tiposEvento(): array
    {
        return [
            'Cumpleaños',
            'Aniversario',
            'Matrimonio',
            'Integración',
            'Conferencia',
            'Fiesta',
            'Otro',
        ];
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(\App\Src\Cliente\Models\Cliente::class, 'cliente_id');
    }

    public function servicio(): BelongsTo
    {
        return $this->belongsTo(\App\Src\Servicio\Models\Servicio::class, 'servicio_id');
    }

    public function reservas(): HasMany
    {
        return $this->hasMany(\App\Src\Reserva\Models\Reserva::class, 'evento_id');
    }

    public function calificaciones(): HasMany
    {
        return $this->hasMany(\App\Src\Calificacion\Models\Calificacion::class, 'evento_id');
    }

    /**
     * Enlaza la factory correcta para el modelo Evento.
     */
    protected static function newFactory()
    {
        return \Database\Factories\EventoFactory::new();
    }
}
