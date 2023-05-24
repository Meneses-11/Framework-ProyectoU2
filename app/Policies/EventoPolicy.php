<?php

namespace App\Policies;

use App\Models\Evento;
use App\Models\Usuario;
use Illuminate\Auth\Access\Response;

class EventoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Usuario $usuario): bool
    {
        return true;// Decimos que el usuario actual puede ver cualquier cosa de los eventos
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Usuario $usuario, Evento $evento): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Usuario $usuario): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Usuario $usuario, Evento $evento): bool
    {
        if($usuario->rol == "Cliente") {
            if($evento->confirmacion == 0) return true;
            else return false;
        }else return false;
    }


    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Usuario $usuario, Evento $evento): bool
    {
        //
        if($usuario->rol == "Cliente") {
            if($evento->confirmacion == 0) return true;
            else return false;
        }else return false;
    }

    public function confirm(Usuario $usuario, Evento $evento): bool
    {
        //
        if($usuario->rol == "Cliente") {
            if($evento->confirmacion == 1) return true;
            else return false;
        }else return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Usuario $usuario, Evento $evento): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Evento $evento): bool
    {
        //
    }
}
