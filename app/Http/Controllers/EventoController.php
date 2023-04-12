<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
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

        return view('cliente.clntEvent', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('cliente.agregar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $newEvent = new Evento;
        $newEvent->id_usuario = $request->idUsuario;
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
        /* 
        $nuevo = new Estudiante();
        $nuevo->nombre = $request->input('nombre');
        $nuevo->save();
        return redirect(route('estudiantes.index'));



        $usuario = new Usuario;
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->nombre_usuario = $request->nusuario;
        $usuario->contraseña = $request->pass;
        $usuario->rol = $request->seleccion;
        $usuario->fecha_nacimiento = date($request->fecha);
        $usuario->direccion = $request->direccion;
        $usuario->email = $request->correo;
        $usuario->telefono = $request->telefono;
        $usuario->save();
        */
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
