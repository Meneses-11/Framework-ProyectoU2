<?php

namespace App\Observers;

use App\Models\Bitacora;
use App\Models\Paquete;
use Illuminate\Support\Facades\Auth;

class ObserverPaquete
{
    /**
     * Handle the Paquete "created" event.
     */
    public function created(Paquete $paquete): void
    {
        //
        $bitacora = new Bitacora();
        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            // Lógica de manejo cuando el usuario no está autenticado
        $bitacora->quien = 'seed o anonimo';
        }
        $bitacora->accion = "Creo el paquete: ".$paquete->nombre;
        $bitacora->save();
    }

    /**
     * Handle the Paquete "updated" event.
     */
    public function updated(Paquete $paquete): void
    {
        //{}
        $bitacora = new Bitacora();
        $bitacora->quien = Auth::user()->nombre;
        $bitacora->accion = "Edito el paquete: ".$paquete->nombre;
        $bitacora->save();
    }

    /**
     * Handle the Paquete "deleted" event.
     */
    public function deleted(Paquete $paquete): void
    {
        //
        $bitacora = new Bitacora();
        $bitacora->quien = Auth::user()->nombre;
        $bitacora->accion = "Elimino el paquete: ".$paquete->nombre;
        $bitacora->save();
    }

    /**
     * Handle the Paquete "restored" event.
     */
    public function restored(Paquete $paquete): void
    {
        //
    }

    /**
     * Handle the Paquete "force deleted" event.
     */
    public function forceDeleted(Paquete $paquete): void
    {
        //
    }
}
