<?php

namespace App\Http\Controllers;
use App\Models\Paquete;
use Illuminate\Http\Request;

class clienteController extends Controller
{
    public function verPaquetes(){
        $paquetes = Paquete::all();
        return view('cliente.clntPaquetes',compact('paquetes'));
    }

    public function verEventos(){
        return view('cliente.clntEvent');
    }

    public function verInformacion(){
        $paquetes = Paquete::all();
        return view('cliente.clntInfo', compact('paquetes'));
    }

    //public function verMas(){
    //    return view('cliente.clntInfo')

   // }

}
