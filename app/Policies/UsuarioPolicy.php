<?php

namespace App\Policies;

use App\Models\Usuario;
use Illuminate\Auth\Access\Response;

class UsuarioPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Usuario $usuario): bool
    {
        //
        if($usuario->rol == "Gerente") return true;
        else return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Usuario $usuario, Usuario $user): bool
    {
        //
        return true;

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Usuario $usuario): bool
    {
        //
        return true;

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Usuario $usuario, Usuario $user): bool
    {
        //
        return true;

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Usuario $usuario, Usuario $user): bool
    {
        //
        if($user->eventos()->count() == 0) return true;
        else return false;

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Usuario $usuario, Usuario $user): bool
    {
        //
        return true;

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Usuario $user): bool
    {
        //
        return true;

    }
}
