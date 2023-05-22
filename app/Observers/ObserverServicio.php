<?php

namespace App\Observers;

use App\Models\Bitacora;
use App\Models\Servicio;
use Illuminate\Support\Facades\Auth;

class ObserverServicio
{
    /**
     * Handle the Servicio "created" event.
     */
    public function created(Servicio $servicio): void
    {
        //
        $bitacora = new Bitacora();
        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            // Lógica de manejo cuando el usuario no está autenticado
        $bitacora->quien = 'seed o anonimo';
        }
        $bitacora->accion = 'Se creo el servicio: '.$servicio->nombre;
        $bitacora->save();
    }

    /**
     * Handle the Servicio "updated" event.
     */
    public function updated(Servicio $servicio): void
    {
        //
        $bitacora = new Bitacora();
        $bitacora->quien = Auth::user()->nombre;
        $bitacora->accion = 'Se actualizo el servicio: '.$servicio->nombre;
        $bitacora->save();
    }

    /**
     * Handle the Servicio "deleted" event.
     */
    public function deleted(Servicio $servicio): void
    {
        //
        $bitacora = new Bitacora();
        $bitacora->quien = Auth::user()->nombre;
        $bitacora->accion = 'Se elimino el servicio: '.$servicio->nombre;
        $bitacora->save();
    }

    /**
     * Handle the Servicio "restored" event.
     */
    public function restored(Servicio $servicio): void
    {
        //
    }

    /**
     * Handle the Servicio "force deleted" event.
     */
    public function forceDeleted(Servicio $servicio): void
    {
        //
    }
}
