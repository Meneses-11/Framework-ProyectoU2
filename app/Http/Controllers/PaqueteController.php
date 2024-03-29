<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Paquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $paquetes = Paquete::all();
        return view('gerente.paquetes.paquetes', compact('paquetes'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gerente.paquetes.agregarPaquete');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|file|mimes:jpeg,jpg,png,gif'
        ]);

        if ($request->activo=="Activo"){
            $activo = true;
        }else{
            $activo = false;
        }
        $paquete = new Paquete();
        $paquete->nombre = $request->nombre;
        $paquete->activo = $activo;
        $paquete->precio = $request->precio;
        $paquete->descripcion = $request->descripcion;
        $paquete->save();

        if ($request->hasFile('images')) {
            $images = $request->file('images');

            // Realiza las operaciones necesarias con las imágenes aquí
            foreach ($images as $image) {

                $archivo = $image;
                $img = $image;
                $imgName = time().rand(1,100).'.'.$img->extension();
                $img -> move(public_path('/img/Paquetes/'),$imgName);
                $ruta_nombre = '/img/Paquetes/'.$imgName;
                $imagen = new Imagen();
                $imagen->ruta = $ruta_nombre;
                $imagen->nombre = $archivo->getClientOriginalName();
                $paquete->imagenes()->save($imagen);
            }



        }else{dd('no entre');}

        return redirect(route('paquete.index'))->with('dat','todo fue bien');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $paquete = Paquete::find($id);
        return view('cliente.clntInfo', compact('paquete'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $paquete = Paquete::find($id);
        return view('gerente.paquetes.editarPaquete', compact('paquete'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $paquete = Paquete::find($id);

            $paquete->nombre = $request->nombre;
            $paquete->precio = $request->precio;
            if($request->activo=='Activo'){
                $paquete->activo = true;
            }else{
                $paquete->activo = false;
            }
            $paquete->descripcion = $request->descripcion;
            $paquete->save();


            return redirect(route('paquete.index'))->with('dat','todo fue bien');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $paquete = Paquete::find($id);
        if ($paquete) {
            $paquete->delete();
            return redirect()->route('paquete.index')->with('success', 'Usuario eliminado correctamente.');
        } else {
            return redirect()->route('paquete.index')->with('error', 'No se pudo eliminar el usuario.');
        }
    }
    public function activo(string $id)
    {
        $paquete = Paquete::find($id);
        $paquete->activo = !$paquete->activo;
        $paquete->save();

        return redirect()->route('paquete.index')->with('success', 'El paquete ha sido actualizado exitosamente.');
    }
}
