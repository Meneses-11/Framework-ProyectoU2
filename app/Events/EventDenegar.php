<?php

namespace App\Events;

use App\Mail\MailDenegarE;
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

class EventDenegar
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $descripcion;
    public $gerente;
    public $evento;

    public function __construct($evento, $gerente, $descripcion)
    {
        //
        $this->descripcion = $descripcion;
        $this->gerente = $gerente;
        $this->evento = $evento;
        Mail::to($this->evento->usuario->email)->send(new MailDenegarE($this->evento, $gerente, $descripcion));
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
