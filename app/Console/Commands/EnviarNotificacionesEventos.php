<?php

namespace App\Console\Commands;

use App\Notifications\EventoProximoNotification;
use App\Src\Evento\Models\Evento;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class EnviarNotificacionesEventos extends Command
{
    protected $signature = 'eventos:notificar';
    protected $description = 'Envía notificaciones de eventos próximos (en las próximas 24 horas)';

    public function handle()
    {
        $this->info('Buscando eventos próximos...');

        // Eventos en las próximas 24 horas
        $eventosProximos = Evento::whereBetween('fecha_evento', [
            Carbon::now(),
            Carbon::now()->addDay()
        ])
        ->where('estado', 'pendiente')
        ->with('cliente')
        ->get();

        if ($eventosProximos->isEmpty()) {
            $this->info('No hay eventos próximos en las próximas 24 horas.');
            return 0;
        }

        $this->info("Se encontraron {$eventosProximos->count()} eventos próximos.");

        // Obtener usuarios administradores o el primer usuario
        $usuarios = User::all();

        foreach ($eventosProximos as $evento) {
            foreach ($usuarios as $usuario) {
                $usuario->notify(new EventoProximoNotification($evento));
            }
            $this->line("✓ Notificación enviada para: {$evento->titulo}");
        }

        $this->info('✅ Notificaciones enviadas correctamente.');
        return 0;
    }
}
