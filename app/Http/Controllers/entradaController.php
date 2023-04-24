<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class entradaController extends Controller
{

    public function validar(Request $sol){
        $usuario = $sol->input('usuario');
        $contraseña = $sol->input('contraseña');

        $user = Usuario::where('nombre_usuario', $sol->input('usuario'))->first();
        if ($user) {
            if ($user->rol == 'Cliente') {
                Auth::login($user);
                session()->put('id', $user->id_usuario);
                return redirect()->route('evento.index');
            } else if ($user->rol == 'Gerente') {
                Auth::login($user);
                return redirect(route('usuario.inicio'));
            } else if ($user->rol  == 'Empleado') {
                Auth::login($user);
                return view('/empleado/empldPrincipal');
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
