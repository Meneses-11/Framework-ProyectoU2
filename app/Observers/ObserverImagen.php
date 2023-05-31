<?php

namespace App\Observers;

use App\Models\Imagen;
use App\Models\BitacoraImg;
use Illuminate\Support\Facades\Auth;

class ObserverImagen
{
    /**
     * Handle the Imagen "created" event.
     */
    public function created(Imagen $imagen): void
    {
        //

        $bitacoraImg = new BitacoraImg();
        if (Auth::check()) {
            $bitacoraImg->id_usuario = Auth::user()->id_usuario;
            $bitacoraImg->id_imagen = $imagen->id;
            $bitacoraImg->accion = Auth::user()->rol." ".Auth::user()->nombre." agregó la imagen: ".$imagen->nombre;
            $bitacoraImg->save();
        }

    }

    /**
     * Handle the Imagen "updated" event.
     */
    public function updated(Imagen $imagen): void
    {
        //

    }

    /**
     * Handle the Imagen "deleted" event.
     */
    public function deleted(Imagen $imagen): void
    {
        //
    }

    /**
     * Handle the Imagen "restored" event.
     */
    public function restored(Imagen $imagen): void
    {
        //
    }

    /**
     * Handle the Imagen "force deleted" event.
     */
    public function forceDeleted(Imagen $imagen): void
    {
        //

    }
}
