<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class entradaController extends Controller
{

    public function validar(Request $sol){
        $usuario = $sol->input('usuario');
        $contraseña = $sol->input('password');
        $user = Usuario::where('nombre_usuario', $sol->input('usuario'))->first();
        $contraseña_bd = $user->contraseña;

        if ($user) {
            if ($user->rol == 'Cliente')
            {
                if (Hash::check($contraseña, $contraseña_bd)) {
                    Auth::login($user);
                    session()->put('id', $user->id_usuario);
                    return redirect()->route('evento.index');
                }
            } else if ($user->rol == 'Gerente') {
                if (Hash::check($contraseña, $contraseña_bd)) {
                    Auth::login($user);
                    return redirect(route('usuario.inicio'));
                }
            } else if ($user->rol  == 'Empleado') {
                if (Hash::check($contraseña, $contraseña_bd)) {
                    Auth::login($user);
                    return view('/empleado/empldPrincipal');
                }
            }
        } else {
            return redirect(route('error'));
        }
    }

    public function error(){
        return view('error');
    }
    public function inicio(){
        $paquetes = Paquete::all();
        return view('anonimo.anonimo',compact('paquetes'));
    }
    public function cerrar_sesion()
    {
        Auth::logout();
        return redirect('inicio');
    }

}
