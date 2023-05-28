<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function paquete()
    {
        //
        $paquetes = Paquete::all();
        return response()->json($paquetes);

    }
    public function servicios()
    {
        //
        $paquetes = Servicio::all();
        return response()->json($paquetes);

    }
}
