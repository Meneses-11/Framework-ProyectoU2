<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class entradaController extends Controller
{
    //
    public function validar(Request $sol){
        $user = $sol->input('usuario');
        $pass = $sol->input('password');
        if ($user==$pass) {
            # code...
            return redirect(route('listaUsuarios'));
        }else {return \redirect(route('error'));}
    }
    public function error(){
        return view();
    }
}
