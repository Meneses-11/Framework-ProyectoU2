<?php

namespace App\Policies;

use App\Models\Paquete;
use App\Models\Usuario;
use Illuminate\Auth\Access\Response;

class PaquetePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Usuario $usuario): bool
    {
        if($usuario->rol == "Gerente") return true;
        else return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Usuario $usuario, Paquete $paquete): bool
    {
        //
    }

    public function activo(Usuario $usuario, Paquete $paquete): bool
    {
        if($paquete->activo == 1) return true;
        else return false;
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
    public function update(Usuario $usuario, Paquete $paquete): bool
    {
        //Existe en un evento no confirmado?????
        if($paquete->eventos()->where('confirmacion',0)->exists()) return false;
        else return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Usuario $usuario, Paquete $paquete): bool
    {
        //Existe en un evento no confirmado?????
        if($paquete->eventos()->where('confirmacion',0)->exists()) return false;
        else return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Usuario $usuario, Paquete $paquete): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Paquete $paquete): bool
    {
        //
    }
}
