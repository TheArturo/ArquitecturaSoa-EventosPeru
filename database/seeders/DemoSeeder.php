<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Src\Cliente\Models\Cliente;
use App\Src\Proveedor\Models\Proveedor;
use App\Src\Servicio\Models\Servicio;
use App\Src\Evento\Models\Evento;
use App\Src\Reserva\Models\Reserva;
use App\Src\Calificacion\Models\Calificacion;
use Illuminate\Support\Str;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // Clientes
        Cliente::factory()->count(10)->create();

        // Proveedores
        Proveedor::factory()->count(8)->create();

        // Servicios
        Servicio::factory()->count(8)->create();

        // Eventos (requiere clientes y servicios)
        $clientes = Cliente::all();
        $servicios = Servicio::all();
        Evento::factory()->count(15)->make()->each(function($evento) use ($clientes, $servicios) {
            $evento->cliente_id = $clientes->random()->id;
            $evento->servicio_id = $servicios->random()->id;
            $evento->save();
        });

        // Reservas (requiere eventos y proveedores)
        $eventos = Evento::all();
        $proveedores = Proveedor::all();
        Reserva::factory()->count(12)->make()->each(function($reserva) use ($eventos, $proveedores) {
            $reserva->evento_id = $eventos->random()->id;
            $reserva->proveedor_id = $proveedores->random()->id;
            $reserva->save();
        });

        // Calificaciones (requiere eventos y proveedores)
        Calificacion::factory()->count(10)->make()->each(function($calificacion) use ($eventos, $proveedores) {
            $calificacion->evento_id = $eventos->random()->id;
            $calificacion->proveedor_id = $proveedores->random()->id;
            $calificacion->save();
        });
    }
}
