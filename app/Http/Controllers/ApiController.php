<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Paquete;
use App\Models\Servicio;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    //

    public function paquetes()
    {
        $paquetes = Paquete::all();

        return response()->json([
            'paquetes' => $paquetes
        ]);
    }


    public function login(Request $sol)
    {
        $user = Usuario::where('nombre_usuario', $sol->input('usuario'))->first();

        if ($user) {
            $usuario = $sol->input('usuario');
            $contraseña = $sol->input('contraseña');
            $contraseña_bd = $user->contraseña;
            if ($user->rol == 'Cliente') {
                if (Hash::check($contraseña, $contraseña_bd)) {
                    $eventos = $user->eventos;
                    return response()->json([
                        'redirect' => route('evento.index'),
                        'usuario' => $user,
                        'eventos' => $eventos,
                    ], 200);
                } else {
                    return response()->json([
                        'message' => 'La contraseña ingresada no es la correcta.',
                    ], 401);
                }
            } elseif ($user->rol == 'Gerente') {
                if (Hash::check($contraseña, $contraseña_bd)) {
                    $eventos = Evento::all();
                    return response()->json([
                        'redirect' => 'gerente',
                        'usuarioOb' => $user,
                        'eventos' => $eventos,
                    ], 200);
                } else {
                    return response()->json([
                        'message' => 'La contraseña ingresada no es la correcta.',
                    ], 401);
                }
            } elseif ($user->rol == 'Empleado') {
                if (Hash::check($contraseña, $contraseña_bd)) {
                    $eventos = Evento::all();

                    return response()->json([
                        'redirect' => 'empleado',
                        'usuarioOb' => $user,
                        'eventos' => $eventos,
                    ], 200);
                } else {
                    return response()->json([
                        'message' => 'La contraseña ingresada no es la correcta.',
                    ], 401);
                }
            }
        }

        return response()->json([
            'message' => 'El usuario ingresado no es el correcto.',
        ], 401);
    }



}
