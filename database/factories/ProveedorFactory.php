<?php
namespace Database\Factories;

use App\Src\Proveedor\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorFactory extends Factory
{
    protected $model = Proveedor::class;

    public function definition(): array
    {
        return [
            'nombre_comercial' => $this->faker->company,
            'ruc' => $this->faker->numerify('20########'),
            'contacto' => $this->faker->name('es_ES'),
            'telefono' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'especialidad' => $this->faker->randomElement(['Catering', 'Decoración', 'Música', 'Fotografía', 'Animación', 'Iluminación']),
            'calificacion_promedio' => $this->faker->randomFloat(1, 3, 5),
        ];
    }
}
