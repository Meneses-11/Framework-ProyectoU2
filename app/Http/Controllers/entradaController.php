<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class entradaController extends Controller
{

    public function validar(Request $sol){
        $user = $sol->input('usuario');
        $pass = $sol->input('password');
        if ($user=='cliente'&&$pass=='cliente') {
            # code...
            return view('/cliente/clntEvent');

        }else if ($user=='admin'&&$pass=='admin') {
            # code...
            return redirect(route('listaUsuarios'));

        }else if ($user=='empleado'&&$pass=='empleado'){
            # code...
            return view('/empleado/empldPrincipal');
            
        }else {return redirect(route('error'));}
    }
    public function error(){
        return view('error');
    }
    public function inicio(){
        return view('anonimo.anonimo');
    }


}
