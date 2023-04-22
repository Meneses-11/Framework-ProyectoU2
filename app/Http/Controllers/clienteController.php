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
   public function store(Request $request){

    $img = $request->file('file');
    $imgName = time().rand(1,100).$img->extension();
    $img -> move(public_path('img'),$imgName);
    return response()->json(['success'=>$imgName]);

}

}
