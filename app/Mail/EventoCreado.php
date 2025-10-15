<?php

namespace App\Mail;

use App\Src\Evento\Models\Evento;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EventoCreado extends Mailable
{
    use Queueable, SerializesModels;

    public $evento;

    public function __construct(Evento $evento)
    {
        $this->evento = $evento;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmación de Evento - ' . $this->evento->titulo,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.evento-creado',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
