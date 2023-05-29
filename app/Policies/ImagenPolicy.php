<?php

namespace App\Policies;

use App\Models\Imagen;
use App\Models\Usuario;
use App\Models\BitacoraImg;
use Illuminate\Auth\Access\Response;


class ImagenPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Usuario $usuario): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Usuario $usuario, Imagen $imagen): bool
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
    public function update(Usuario $usuario, Imagen $imagen): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Usuario $usuario, Imagen $imagen): bool
    {
        $registro = BitacoraImg :: where('id_imagen',$imagen->id);
        //$regEmpleado =
        //if ($registro->id_usuario == $usuario -> id_usuraio || )
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Usuario $usuario, Imagen $imagen): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Imagen $imagen): bool
    {
        //
    }
}
