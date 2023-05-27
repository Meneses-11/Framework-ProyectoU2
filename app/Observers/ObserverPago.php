<?php

namespace App\Observers;

use App\Models\Pago;

class ObserverPago
{
    /**
     * Handle the Pago "created" event.
     */
    public function created(Pago $pago): void
    {
        $bitacora = new Bitacora();
        $bitacora->quien = Auth::user()->nombre;
        $bitacora->accion = "Creo un pago: ".$pago->id_pago;
        $bitacora->save();
    }

    /**
     * Handle the Pago "updated" event.
     */
    public function updated(Pago $pago): void
    {
        $bitacora = new Bitacora();
        $bitacora->quien = Auth::user()->nombre;
        $bitacora->accion = "Actualizo el pago: ".$pago->id_pago;
        $bitacora->save();
    }

    /**
     * Handle the Pago "deleted" event.
     */
    public function deleted(Pago $pago): void
    {
        $bitacora = new Bitacora();
        $bitacora->quien = Auth::user()->nombre;
        $bitacora->accion = "Elimino el pago: ".$pago->id_pago;
        $bitacora->save();
    }

    /**
     * Handle the Pago "restored" event.
     */
    public function restored(Pago $pago): void
    {
        //
    }

    /**
     * Handle the Pago "force deleted" event.
     */
    public function forceDeleted(Pago $pago): void
    {
        //
    }
}
