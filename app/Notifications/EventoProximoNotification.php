<?php

namespace App\Notifications;

use App\Src\Evento\Models\Evento;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EventoProximoNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $evento;

    public function __construct(Evento $evento)
    {
        $this->evento = $evento;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Recordatorio: Evento Próximo - ' . $this->evento->titulo)
            ->greeting('¡Hola!')
            ->line('Te recordamos que tienes un evento próximo:')
            ->line('**Evento:** ' . $this->evento->titulo)
            ->line('**Fecha:** ' . \Carbon\Carbon::parse($this->evento->fecha_evento)->format('d/m/Y H:i'))
            ->line('**Ubicación:** ' . $this->evento->ubicacion)
            ->line('**Estado:** ' . ucfirst($this->evento->estado))
            ->action('Ver Detalles', route('eventos.show', $this->evento->id))
            ->line('Gracias por usar Eventos Perú!');
    }

    public function toArray($notifiable)
    {
        return [
            'evento_id' => $this->evento->id,
            'titulo' => $this->evento->titulo,
            'fecha_evento' => $this->evento->fecha_evento,
            'mensaje' => 'Evento próximo: ' . $this->evento->titulo,
        ];
    }
}
