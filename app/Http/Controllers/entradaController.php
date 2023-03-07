<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class entradaController extends Controller
{

    public function validar(Request $sol){
        $user = $sol->input('usuario');
        $pass = $sol->input('password');
<<<<<<< HEAD
        //dump($user);
        //dump($pass);
=======
>>>>>>> fb60b8a (Update Carlos)
        if ($user=='cliente'&&$pass=='cliente') {
            # code...
            return view('/cliente/clntEvent');

        }else if ($user=='admin'&&$pass=='admin') {
            # code...
            return redirect(route('listaUsuarios'));

        }else {return redirect(route('error'));}
    }
    public function error(){
        return view();
    }
}
