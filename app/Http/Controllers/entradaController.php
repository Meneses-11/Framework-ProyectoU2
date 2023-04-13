<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class entradaController extends Controller
{

    public function validar(Request $sol){
        $user = Usuario::where('nombre_usuario', $sol->input('usuario'))
                    ->where('contraseña', $sol->input('password'))
                    ->first();
        if ($user) {
            if ($user->rol == 'Cliente') {
                return view('/cliente/clntEvent');
            } else if ($user->rol == 'Gerente') {
                return redirect(route('usuario.inicio'));
            } else if ($user->rol  == 'Empleado') {
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
        return view('anonimo.anonimo');
    }


}
