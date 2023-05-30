<?php

namespace App\Http\Controllers;
use App\Models\Imagen;
use App\Models\Paquete;
use Illuminate\Http\Request;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Image;

class clienteController extends Controller
{
    public function verPaquetes(){
        $paquetes = Paquete::all();
        return view('cliente.clntPaquetes',compact('paquetes'));
    }

    public function verEventos(){
        return view('cliente.clntEvent');
    }
/*
    public function verInformacion(){
        $paquetes = Paquete::all();
        return view('cliente.clntInfo', compact('paquetes'));
    }*/

    //public function verMas(){
    //    return view('cliente.clntInfo')

   // }
    public function store(Request $request){

        $img = $request->file('file');
        $imgName = time().rand(1,100).$img->extension();
        $img -> move(public_path('img'),$imgName);
        return response()->json(['success'=>$imgName]);

    }
    public function upload( Request $request) // metodo que hace la acción de guardar la imagen en el path public/uploads
    {
        dd('aqui llega todo xd');
    /* $image = $request->file('file');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads'), $imageName);
        return response()->json(['success' => true]);*/

    }

}
