<?php

namespace App\Http\Controllers;

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
