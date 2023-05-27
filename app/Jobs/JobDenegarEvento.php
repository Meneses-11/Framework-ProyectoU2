<?php

namespace App\Jobs;

use App\Mail\MailDenegacionEvento;
use App\Models\Evento;
use App\Models\Usuario;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class JobDenegarEvento implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $cliente;
    public $gerente;
    public $evento;
    public $argumento;
    public function __construct(Usuario $cliente, Usuario $gerente, Evento $evento, $argumento)
    {
        //
        $this->cliente = $cliente;
        $this->gerente = $gerente;
        $this->evento = $evento;
        $this->argumento = $argumento;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        Mail::to($this->cliente->correo)->send(new MailDenegacionEvento($this->cliente, $this->gerente, $this->evento, $this->argumento));

    }
}
