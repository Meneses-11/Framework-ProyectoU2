<?php

namespace App\Http\Controllers;

use App\Events\EventDenegar;
use App\Events\EventEventos;
use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Paquete;
use App\Models\Servicio;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $usuario = session('id');
        $eventos = Evento::where('id_usuario',$usuario)->get();
        $paquetes = Paquete::pluck('id_paquete','nombre');
        $servicios = Servicio::pluck('id_servicio','nombre');
        /*$servSelec = [];
        foreach($eventos as $evento){
            $servSelec[$evento -> servicios() -> pluck('id_evento')] = $evento -> servicios() -> pluck('nombre');
        }
        echo $servSelec;*/

        return view('cliente.clntEvent', compact('eventos','usuario','paquetes','servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
        $newEvent->precio = $request-> precio;
        $newEvent->fecha = date($request-> fecha);
        $newEvent->hora_inicio = Carbon::parse($request->hrIni)->format('H:i:s');
        $newEvent->hora_fin = Carbon::parse($request->hrFin)->format('H:i:s');
        $newEvent->descripcion = $request-> descripcion;
        $newEvent->num_personas = $request-> numPersonas;
        $newEvent->save();

        $evento = Evento::find($newEvent->id_evento);
        $serviSelect = $request -> idServicio;
        $evento -> servicios() -> attach($serviSelect);

        return redirect(route('evento.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $evento = evento::find($id);

        return view('contrato.contrato', compact('evento'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        $paquetes = Paquete::all();
        $servicios = Servicio::all();
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
        $evento->precio = $request-> precio;
        $evento->fecha = date($request-> fecha);
        $evento->hora_inicio = Carbon::parse($request->hrIni)->format('H:i:s');
        $evento->hora_fin = Carbon::parse($request->hrFin)->format('H:i:s');
        $evento->descripcion = $request-> descripcion;
        $evento->num_personas = $request-> numPersonas;
        $evento->save();

        $serviSelect = $request -> idServicio;
        $evento -> servicios() -> sync($serviSelect);

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

        $evento->confirmacion = "".intval($request->input('confirmacion'));
        $evento->save();
        Event::dispatch(new EventEventos($evento -> usuario, $evento));

        return redirect()->route('evento.index');
    }

    public function denegar(Request $request, $id)
    {
        $evento = Evento::find($id);

        /*$evento->confirmacion = intval($request->input('confirmacion'));
        $evento->save();*/
        $desc = $request->description;
        Event::dispatch(new EventDenegar($evento, Auth::user(), $desc));
        $evento->confirmacion = "0";
        $evento->id_gerente = Auth::user()->id_usuario;
        $evento->save();
        return redirect()->back();
    }

    public function crearP(Request $request)
    {
        $paquete = Paquete::find($request->paquete);
        $paquetes = Paquete::all();
        $servicios = Servicio::all();
        return view('cliente.agregar', compact('paquetes','servicios','paquete'));
    }

    public function mostrar()
    {
        $eventos = Evento::all();

        return view('gerente.eventos.index',compact('eventos'));
    }

    public function imagenes(){
        $evento = Evento::find(1);
        $imagenes = $evento -> imagenes;
        return view('imagenes.index', compact('imagenes','evento'));
    }
}
