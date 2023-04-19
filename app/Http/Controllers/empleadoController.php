<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class empleadoController extends Controller
{
    //
    public function principal(){
        return view('empleado.empldPrincipal');
    }

    
}
