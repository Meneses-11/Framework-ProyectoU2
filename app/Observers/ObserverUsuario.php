<?php

namespace App\Observers;

use App\Models\Bitacora;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class ObserverUsuario
{
    /**
     * Handle the Usuario "created" event.
     */
    public function created(Usuario $usuario): void
    {
        //
        $bitacora = new Bitacora();
        if (Auth::check()) {
            $bitacora->quien = Auth::user()->nombre;
        } else {
            // Lógica de manejo cuando el usuario no está autenticado
        $bitacora->quien = 'seed o anonimo';
        }
        $bitacora->accion = "Creo un nuevo usuario: ".$usuario->nombre;
        $bitacora->save();
    }

    /**
     * Handle the Usuario "updated" event.
     */
    public function updated(Usuario $usuario): void
    {
        //
        $bitacora = new Bitacora();
        $bitacora->quien = Auth::user()->nombre;
        $bitacora->accion = "Actualizo un usuario: ".$usuario->nombre;
        $bitacora->save();
    }

    /**
     * Handle the Usuario "deleted" event.
     */
    public function deleted(Usuario $usuario): void
    {
        //
        $bitacora = new Bitacora();
        $bitacora->quien = Auth::user()->nombre;
        $bitacora->accion = "Elimino un usuario: ".$usuario->nombre;
        $bitacora->save();
    }

    /**
     * Handle the Usuario "restored" event.
     */
    public function restored(Usuario $usuario): void
    {
        //
    }

    /**
     * Handle the Usuario "force deleted" event.
     */
    public function forceDeleted(Usuario $usuario): void
    {
        //
    }
}
