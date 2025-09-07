<?php
namespace Database\Factories;

use App\Src\Servicio\Models\Servicio;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServicioFactory extends Factory
{
    protected $model = Servicio::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->randomElement(['Banquete', 'Fotografía', 'Música', 'Decoración', 'Animación', 'Iluminación']),
            'descripcion' => $this->faker->sentence(8, true),
            'precio_base' => $this->faker->randomFloat(2, 500, 5000),
            'duracion_estimada_min' => $this->faker->numberBetween(60, 480),
            'estado' => $this->faker->randomElement([1, 0]),
        ];
    }
}
