<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class UsuariosController extends Controller
{
    //
    public function index()
    {
        $clientes = Usuario::all();
        return view('gerente.inicio', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $usuario = new Usuario;
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->nombre_usuario = $request->nusuario;
        $usuario->contraseña = $request->pass;
        $usuario->rol = $request->seleccion;
        $usuario->fecha_nacimiento = date($request->fecha) ;
        $usuario->direccion = $request->direccion;
        $usuario->email = $request->correo;
        $usuario->telefono = $request->telefono;
        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Cliente creado correctamente.');
    }

    public function edit(Usuario $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->nombre_usuario = $request->nusuario;
        $usuario->contraseña = $request->pass;
        $usuario->rol = $request->seleccion;
        $usuario->fecha_nacimiento = date($request->fecha) ;
        $usuario->direccion = $request->direccion;
        $usuario->email = $request->correo;
        $usuario->telefono = $request->telefono;
        $usuario->save();

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente.');
    }
}
