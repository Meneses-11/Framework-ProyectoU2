<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    //
    public function index()
    {
        $clientes = Usuario::all();
        $eventos = Evento::all();
        return view('gerente.usuarios.inicio', compact('clientes','eventos'));
    }

    public function create()
    {
        return view('gerente.usuarios.agregar');
    }
    public function show(string $id)
    {
        //
        $alguien = Usuario::find($id);
        return view('gerente.usuarios.detalle', compact('alguien'));
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

        return redirect()->route('usuario.inicio')->with('success', 'Cliente creado correctamente.');
    }

    public function edit($alguien)
    {
        $alguien = Usuario::find($alguien);
        return view('gerente.usuarios.editar', compact('alguien'));
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

        return redirect()->route('usuario.inicio')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy($usuario)
    {
        $usuario = Usuario::find($usuario);
        if ($usuario) {
            $usuario->delete();
            return redirect()->route('usuario.inicio')->with('success', 'Usuario eliminado correctamente.');
        } else {
            return redirect()->route('usuario.inicio')->with('error', 'No se pudo eliminar el usuario.');
        }
    }
}
