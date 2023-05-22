<?php

namespace App\Observers;

use App\Models\Bitacora;
use App\Models\Evento;
use Illuminate\Support\Facades\Auth;

class ObserverEvento
{
    /**
     * Handle the Evento "created" event.
     */
    public function created(Evento $evento): void
    {
        //
        $bitacora = new Bitacora();
        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            // Lógica de manejo cuando el usuario no está autenticado
        $bitacora->quien = 'seed o anonimo';
        }
        $bitacora->accion = "Se creo el evento: ".$evento->id_evento;
        $bitacora->save();

    }

    /**
     * Handle the Evento "updated" event.
     */
    public function updated(Evento $evento): void
    {
        //
        $bitacora = new Bitacora();
        $bitacora-> quien = Auth::user()->nombre;
        $bitacora->accion = "Se actualizo el evento: ".$evento->id_evento;
        $bitacora->save();
    }

    /**
     * Handle the Evento "deleted" event.
     */
    public function deleted(Evento $evento): void
    {
        //
        $bitacora = new Bitacora();
        $bitacora-> quien = Auth::user()->nombre;
        $bitacora->accion = "Se elimino el evento: ".$evento->id_evento;
        $bitacora->save();
    }

    /**
     * Handle the Evento "restored" event.
     */
    public function restored(Evento $evento): void
    {
        //
    }

    /**
     * Handle the Evento "force deleted" event.
     */
    public function forceDeleted(Evento $evento): void
    {
        //
    }
}
