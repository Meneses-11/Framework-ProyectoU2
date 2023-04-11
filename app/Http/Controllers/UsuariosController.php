<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

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
        return view('gerente.agregar');
    }

    public function store(Request $request)
    {
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

        return redirect()->route('usuarios.index')->with('success', 'Cliente creado correctamente.');
    }

    public function edit($alguien)
    {
        $alguien = Usuario::find($alguien);
        return view('gerente.editar', compact('alguien'));
    }

    public function update(Request $request, $usuario)
    {
        $usuario = Usuario::find($usuario);
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

        return redirect()->route('usuarios.index')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy($usuario)
    {
        $usuario = Usuario::find($usuario);
        if ($usuario) {
            $usuario->delete();
            return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
        } else {
            return redirect()->route('usuarios.index')->with('error', 'No se pudo eliminar el usuario.');
        }
    }
}
