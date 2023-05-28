<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Pago;
use App\Models\Usuario;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $eventos = Evento::all();
        return view('empleado.inicio', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if(Auth::user()->rol==='Gerente'){
            $pago = new Pago();
            $pago->evento_id = $request->id_evento;
            $pago->cantidad = $request->cantidad;
            $pago->save();
            return redirect()->back();
        }else{
        $pago = new Pago();
        $pago->evento_id = $request->id_evento;
        $pago->cantidad = $request->cantidad;
        $pago->save();
        return redirect()->route('empleado.index');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $empleado)
    {
        //
    }
}
