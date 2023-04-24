<?php

namespace App\Http\Controllers;


use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    //
    public function index()
    {
        $clientes = Usuario::all();
        return view('gerente.usuarios.inicio', compact('clientes'));
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
        $usuario->contraseña = Hash::make($request->input('contraseña'));
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
    //how to make a get function to change a password on laravel 9x?
    public function cambiarContraseña(Request $request)
    {
        $usuario = $request->input('usuario');

        $user = Usuario::where('nombre_usuario',$usuario)->first();

        $password_actual = $request->input('password_actual');
        $password_nueva = $request->input('password_nueva');
        $password_confirmacion = $request->input('password_confirmacion');
        if ($user){


        if (!Hash::check($password_actual, $user->contraseña)) {
            // La contraseña actual no es correcta
            return redirect()->back()->withErrors(['password_actual' => 'La contraseña actual es incorrecta']);
        }

        if ($password_nueva !== $password_confirmacion) {
            // Las contraseñas nuevas no coinciden
            return redirect()->back()->withErrors(['password_nueva' => 'Las contraseñas nuevas no coinciden']);
        }

        // Las contraseñas son correctas, actualizamos la contraseña del usuario
        $user->contraseña = Hash::make($password_nueva);
        $user->save();

        return redirect('login')->with('success', 'Contraseña cambiada con éxito');

        }else return redirect()->back()->withErrors(['usuario' => 'el nombre de usuario es invalido, verifique su entrada de datos']);
    }
    public function registrarse(Request $request)
    {
        $p1 = $request->input('p1');
        $p2 = $request->input('p2');
        if($p1 !== $p2){
            return redirect()->back()->withErrors(['password_nueva' => 'Las contraseñas no coinciden']);
        }else{

        $usuario = new Usuario;
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->nombre_usuario = $request->nusuario;
        $usuario->contraseña = Hash::make($request->input('contraseña'));
        $usuario->contraseña = $request->pass;
        $usuario->fecha_nacimiento = date($request->fecha);
        $usuario->direccion = $request->direccion;
        $usuario->email = $request->correo;
        $usuario->telefono = $request->telefono;
        $usuario->save();
        return redirect()->route('usuario.inicio')->with('success', 'Cliente creado correctamente.');
        }

    }


}
