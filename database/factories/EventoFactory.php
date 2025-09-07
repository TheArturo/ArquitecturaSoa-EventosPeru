<?php
namespace Database\Factories;

use App\Src\Evento\Models\Evento;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventoFactory extends Factory
{
    protected $model = Evento::class;

    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(3, true),
            'descripcion' => $this->faker->paragraph(2, true),
            'fecha_evento' => $this->faker->dateTimeBetween('+1 days', '+1 year'),
            'ubicacion' => $this->faker->city,
            'tipo_evento' => $this->faker->randomElement([ 'Cumpleaños', 'Aniversario', 'Matrimonio', 'Integración', 'Conferencia', 'Fiesta', 'Otro' ]),
            'estado' => $this->faker->randomElement(['borrador', 'pendiente', 'confirmado', 'en_ejecucion', 'cerrado', 'cancelado']),
            'costo_estimado' => $this->faker->randomFloat(2, 1000, 20000),
        ];
    }
}
