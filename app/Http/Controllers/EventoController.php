<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Paquete;
use App\Models\Servicio;
use Carbon\Carbon;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $eventos = Evento::all();
        $usuario = session('id');
        $paquetes = Paquete::pluck('id_paquete','nombre');
        $servicios = Servicio::pluck('id_servicio','nombre');

        return view('cliente.clntEvent', compact('eventos','usuario','paquetes','servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        /*$paquetes = Paquete::pluck('id_paquete','nombre','precio');
        $servicios = Servicio::pluck('id_servicio','nombre','precio');*/
        $paquetes = Paquete::all();
        $servicios = Servicio::all();
        return view('cliente.agregar', compact('paquetes','servicios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $usuario = session('id');

        $newEvent = new Evento;
        $newEvent->id_usuario = $usuario;
        $newEvent->id_paquete = $request->idPaquete;
        $newEvent->id_servicio = $request->idServicio;
        $newEvent->precio = $request-> precio;
        $newEvent->fecha = date($request-> fecha);
        $newEvent->hora_inicio = Carbon::parse($request->hrIni)->format('H:i:s');
        $newEvent->hora_fin = Carbon::parse($request->hrFin)->format('H:i:s');
        $newEvent->descripcion = $request-> descripcion;
        $newEvent->num_personas = $request-> numPersonas;
        $newEvent->save();

        return redirect(route('evento.index'));
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
    public function edit(Evento $evento)
    {
        $paquetes = Paquete::pluck('id_paquete','nombre');
        $servicios = Servicio::pluck('id_servicio','nombre');
        return view('cliente.editar', compact('evento','paquetes','servicios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evento $evento)
    {
        $usuario = session('id');

        $evento->id_usuario = $usuario;
        $evento->id_paquete = $request->idPaquete;
        $evento->id_servicio = $request->idServicio;
        $evento->precio = $request-> precio;
        $evento->fecha = date($request-> fecha);
        $evento->hora_inicio = Carbon::parse($request->hrIni)->format('H:i:s');
        $evento->hora_fin = Carbon::parse($request->hrFin)->format('H:i:s');
        $evento->descripcion = $request-> descripcion;
        $evento->num_personas = $request-> numPersonas;
        $evento->save();

        return redirect(route('evento.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        //
        $evento -> delete();
        return redirect(route('evento.index'));
    }

    public function confirmar(Request $request, $id)
    {
        $evento = Evento::find($id);
        $evento->confirmacion = intval($request->input('confirmacion'));
        $evento->save();

        return redirect()->route('evento.index');
    }
}
