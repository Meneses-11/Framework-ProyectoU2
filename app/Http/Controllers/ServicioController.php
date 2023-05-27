<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $servicios = Servicio::all();
       return view('gerente.servicios.servicios', compact('servicios'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('gerente.servicios.agregarServicio');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $servicio = new Servicio();
        $servicio->nombre = $request->nombre;
        $servicio->precio = $request->precio;
        $servicio->descripcion = $request->descripcion;
        $servicio->save();
        if ($request->hasFile('images')) {
            $images = $request->file('images');

            // Realiza las operaciones necesarias con las imágenes aquí
            foreach ($images as $image) {
                $archivo = $image;
                $img = $image;
                $imgName = time().rand(1,100).'.'.$img->extension();
                $img -> move(public_path('/img/Servicios/'),$imgName);
                $ruta_nombre = '/img/Paquetes/'.$imgName;
                $imagen = new Imagen();
                $imagen->ruta = $ruta_nombre;
                $imagen->nombre = $archivo->getClientOriginalName();
                $servicio->imagenes()->save($imagen);
            }

        }else{dd('no entre');}
        return redirect(route('servicio.inicio'))->with('dat','todo fue bien');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $servicio = Servicio::find($id);
        return view('gerente.servicios.editarServicio', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $servicio = Servicio::find($id);

            $servicio->nombre = $request->nombre;
            $servicio->precio = $request->precio;
            $servicio->descripcion = $request->descripcion;
            $servicio->save();
            return redirect(route('servicio.inicio'))->with('dat','todo fue bien');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $servicio = Servicio::find($id);
        if ($servicio) {
            $servicio->delete();
            return redirect()->route('servicio.inicio')->with('success', 'Usuario eliminado correctamente.');
        } else {
            return redirect()->route('servicio.inicio')->with('error', 'No se pudo eliminar el usuario.');
        }
    }
}
