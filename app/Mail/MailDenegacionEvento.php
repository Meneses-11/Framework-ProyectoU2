<?php

namespace App\Mail;

use App\Models\Evento;
use App\Models\Usuario;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailDenegacionEvento extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $cliente;
    public $gerente;
    public $evento;
    public $argumento;
    public function __construct(Usuario $cliente, Usuario $gerente, Evento $evento, $argumento)
    {
        $this->cliente = $cliente;
        $this->gerente = $gerente;
        $this->evento = $evento;
        $this->argumento = $argumento;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Mail Denegacion Evento',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Correos.denegacion',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
