<?php

namespace App\Notifications;

use App\Src\Evento\Models\Evento;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EventoCreadoNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $evento;

    public function __construct(Evento $evento)
    {
        $this->evento = $evento;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nuevo Evento Creado - ' . $this->evento->titulo)
            ->greeting('¡Hola ' . $notifiable->name . '!')
            ->line('Se ha creado un nuevo evento en el sistema:')
            ->line('**Evento:** ' . $this->evento->titulo)
            ->line('**Cliente:** ' . $this->evento->cliente->nombre)
            ->line('**Fecha:** ' . \Carbon\Carbon::parse($this->evento->fecha_evento)->format('d/m/Y H:i'))
            ->line('**Ubicación:** ' . $this->evento->ubicacion)
            ->action('Ver Evento', route('eventos.show', $this->evento->id))
            ->line('¡Gracias por confiar en Eventos Perú!');
    }
}
