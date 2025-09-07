<?php
namespace Database\Factories;

use App\Src\Reserva\Models\Reserva;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservaFactory extends Factory
{
    protected $model = Reserva::class;

    public function definition(): array
    {
        return [
            'fecha_reserva' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'estado' => $this->faker->randomElement(['asignado', 'confirmado', 'rechazado', 'cancelado']),
        ];
    }
}
