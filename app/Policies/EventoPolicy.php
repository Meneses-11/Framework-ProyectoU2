<?php

namespace App\Policies;

use App\Models\Evento;
use App\Models\Usuario;
use DateTime;
use Illuminate\Auth\Access\Response;

class EventoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Usuario $usuario): bool
    {
        //return true;// Decimos que el usuario actual puede ver cualquier cosa de los eventos
        if ($usuario->rol == "Cliente") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Usuario $usuario, Evento $evento)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Usuario $usuario)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Usuario $usuario, Evento $evento): bool
    {
        if($usuario->rol == "Cliente") {
            if($evento->confirmacion == 0 && ($evento->id_usuario == $usuario->id_usuario)) {
                return true;
            }else return false;
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

            if($evento->confirmacion == 1) return true;
            else return false;

    }

    public function confirmacion(Usuario $usuario, Evento $evento): bool
    {
        if ($evento->confirmacion == 1) {
            // Obtener la fecha y hora actual
            date_default_timezone_set('America/Mexico_City');
            $fechaActual = new DateTime();
            $fechaActual->modify('-1 hour');
            $horaActual = new DateTime();
            $horaActual->modify('-1 hour');

            // Convertir la fecha y hora del evento en objetos DateTime
            $fechaInicioEvento = new DateTime($evento->fecha);
            $horaInicioEvento = new DateTime($evento->hora_inicio);
            $horaFinEvento = new DateTime($evento->hora_fin);

            // Verificar si el día del inicio coincide con el día actual
            if ($fechaInicioEvento->format('Y-m-d') === $fechaActual->format('Y-m-d')) {
                // Calcular la tolerancia de hasta 4 horas después del fin
                $horaFinTolerancia = $horaFinEvento->modify('+4 hours');

                // Verificar si la hora actual está dentro del rango de inicio y tolerancia
                if ($horaActual->format('H:i:s') >= $horaInicioEvento->format('H:i:s') && $horaActual->format('H:i:s') <= $horaFinTolerancia->format('H:i:s')) {
                    // El evento se está realizando
                    return true;
                }
            }

            // El evento no se está realizando
            return false;
        } else {
            return false;
        }
    }


    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Usuario $usuario, Evento $evento)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Evento $evento): bool
    {
        //
        return true;
    }
}
