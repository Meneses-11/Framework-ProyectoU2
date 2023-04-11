<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class gerenteController extends Controller
{
    //
    public function test(){
        return view('gerente.gtest');
    }
    public function servicios(){
        return view('gerente.servicios');
    }
    public function usuarios(){
        return view('gerente.inicio');
    }
}
