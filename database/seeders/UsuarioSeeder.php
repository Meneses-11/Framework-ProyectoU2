<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        /*
        $table->increments('id_cliente'); autoincremento
            $table->string('nombre');
            $table->string('apellido');
            $table->string('nombre_usuario');
            $table->string('contraseña');
            $table->dateTime('fecha_nacimiento');
            $table->string('direccion');
            $table->string('email');
            $table->string('telefono');
            $table->timestamps(); laravel se ocupa
        */
        $alguien = new Usuario;
        $alguien->nombre = "Hugo";
        $alguien->apellido = "Tovilla";
        $alguien->nombre_usuario = "hugo";
        $alguien->contraseña = "1234";
        $alguien->rol='Cliente';
        $alguien->fecha_nacimiento = "2001-01-01";
        $alguien->direccion = "Calle de las rosas";
        $alguien->email = "hugot@gamil.com";
        $alguien->telefono = "9611506183";
        $alguien->save();
        $alguien = new Usuario;
        $alguien->nombre = "Paco";
        $alguien->apellido = "Meneses";
        $alguien->nombre_usuario = "paco";
        $alguien->contraseña = "1234";
        $alguien->rol='Cliente';
        $alguien->fecha_nacimiento = "2001-05-01";
        $alguien->direccion = "Avenida siempre viva";
        $alguien->email = "pacom@gamil.com";
        $alguien->telefono = "9611506184";
        $alguien->save();
        $alguien = new Usuario;
        $alguien->nombre = "Luis";
        $alguien->apellido = "Morales";
        $alguien->nombre_usuario = "luis";
        $alguien->contraseña = "1234";
        $alguien->rol='Cliente';
        $alguien->fecha_nacimiento = "2001-06-01";
        $alguien->direccion = "Calle de las petunias";
        $alguien->email = "luism@gamil.com";
        $alguien->telefono = "9611506185";
        $alguien->save();

        $alguien = new Usuario;
        $alguien->nombre = "José";
        $alguien->apellido = "Lopez";
        $alguien->nombre_usuario = "jose";
        $alguien->contraseña = "1234";
        $alguien->rol='Empleado';
        $alguien->fecha_nacimiento = "2001-07-01";
        $alguien->direccion = "Direccion conocida";
        $alguien->email = "josel@gamil.com";
        $alguien->telefono = "9611506100";
        $alguien->save();

        $alguien = new Usuario;
        $alguien->nombre = "Carlos";
        $alguien->apellido = "Morales";
        $alguien->nombre_usuario = "carlos";
        $alguien->contraseña = "1234";
        $alguien->rol='Gerente';
        $alguien->fecha_nacimiento = "2001-08-01";
        $alguien->direccion = "Direccion conocida";
        $alguien->email = "CarlosM@gamil.com";
        $alguien->telefono = "9611506180";
        $alguien->save();
        /*
        empleados

        $alguien = new Empleado;
        $alguien->nombre = "José";
        $alguien->apellido = "Lopez";
        $alguien->email = "josel@gamil.com";
        $alguien->telefono = "9611506100";
        $alguien->save();

        gerentes
        $alguien = new Gerente;
        $alguien->nombre = "Carlos";
        $alguien->apellido = "Morales";
        $alguien->email = "CarlosM@gamil.com";
        $alguien->telefono = "9611506180";
        $alguien->save();
        */
    }
}
