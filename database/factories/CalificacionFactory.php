<?php
namespace Database\Factories;

use App\Src\Calificacion\Models\Calificacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class CalificacionFactory extends Factory
{
    protected $model = Calificacion::class;

    public function definition(): array
    {
        return [
            'puntaje' => $this->faker->numberBetween(1, 5),
            'comentario' => $this->faker->sentence(8, true),
        ];
    }
}
