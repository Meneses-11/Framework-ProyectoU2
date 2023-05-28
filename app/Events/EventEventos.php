<?php

namespace App\Events;

use App\Mail\MailConfirmarE;
use App\Models\Evento;
use App\Models\Usuario;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EventEventos
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $descripcion;
    public $cliente;
    public $gerente;
    public $evento;
    public function __construct(Usuario $cliente, Evento $evento)
    {
        //
        $this->cliente = $cliente;
        $this->evento = $evento;
        Mail::to(Auth::user()->email)->send(new MailConfirmarE($this->cliente, $this->evento));

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
