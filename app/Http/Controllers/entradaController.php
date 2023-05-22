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

        $user = Usuario::where('nombre_usuario', $sol->input('usuario'))->first();

        if ($user) {
            $usuario = $sol->input('usuario');
            $contraseña = $sol->input('password');
            $contraseña_bd = $user->contraseña;
            if ($user->rol == 'Cliente')
            {
                if (Hash::check($contraseña, $contraseña_bd)) {
                    Auth::guard('web_usuarios')->login($user);
                    $_SESSION['AuthGuard']='web_usuarios';
                    //Auth::login($user);
                    session()->put('id', $user->id_usuario);
                    return redirect()->route('evento.index');
                }else return redirect()->route('login')->with('error2','La contraseña ingresada no es la correcta');
            } else if ($user->rol == 'Gerente') {
                if (Hash::check($contraseña, $contraseña_bd)) {
                    Auth::guard('web_usuarios')->login($user);
                    $_SESSION['AuthGuard']='web_usuarios';
                    return redirect(route('usuario.inicio'));
                }else return redirect()->route('login')->with('error2','La contraseña ingresada no es la correcta');
            } else if ($user->rol  == 'Empleado') {
                if (Hash::check($contraseña, $contraseña_bd)) {
                    //Auth::login($user);
                    Auth::guard('web_usuarios')->login($user);
                    $_SESSION['AuthGuard']='web_usuarios';

                    return view('/empleado/empldPrincipal');
                }else return redirect()->route('login')->with('error2','La contraseña ingresada no es la correcta');
            }
        } else {
            return redirect()->route('login')->with('error1','El usuario ingresado no es el correcto');
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
        session_destroy();
        Auth::guard('web_usuarios')->logout(); // Cierra la sesión del usuario
        $_SESSION['AuthGuard'] = null; // Opcional: limpia la variable de sesión
        session()->forget('id'); // Opcional: elimina la variable de sesión 'id'
        return redirect('inicio');
    }

}
