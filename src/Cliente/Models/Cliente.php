<?php
namespace App\Src\Cliente\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    protected $fillable = [
        'nombre', 'documento', 'telefono', 'email', 'direccion'
    ];

    public function eventos(): HasMany
    {
        return $this->hasMany(\App\Src\Evento\Models\Evento::class, 'cliente_id');
    }

    /**
     * Enlaza la factory correcta para el modelo Cliente.
     */
    protected static function newFactory()
    {
        return \Database\Factories\ClienteFactory::new();
    }
}
