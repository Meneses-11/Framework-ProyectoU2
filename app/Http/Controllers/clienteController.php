<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class clienteController extends Controller
{
    //
    public function verPaquetes(){
        return view('cliente.clntPaquetes');
    }
    public function verEventos(){
        return view('cliente.clntEvent');
    }
    public function verInformacion(){
        return view('cliente.clntInfo');
    }
}
