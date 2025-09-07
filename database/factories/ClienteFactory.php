<?php
namespace Database\Factories;

use App\Src\Cliente\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name('es_ES'),
            // Genera un DNI peruano de 8 dígitos
            'documento' => $this->faker->unique()->numerify('########'),
            'telefono' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'direccion' => $this->faker->address,
        ];
    }
}
