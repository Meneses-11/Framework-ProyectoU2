<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //tres clientes hugo, paco, luis
        $alguien = new Usuario;
        $alguien->nombre = "Hugo";
        $alguien->apellido = "Tovilla";
        $alguien->nombre_usuario = "hugo";
        $alguien->contraseña = Hash::make('1234');
        $alguien->rol='Cliente';
        $alguien->fecha_nacimiento = "2001-01-01";
        $alguien->direccion = "Calle de las rosas";
        $alguien->email = "hugot@gmail.com";
        $alguien->telefono = "9611506183";
        $alguien->save();

        $alguien = new Usuario;
        $alguien->nombre = "Paco";
        $alguien->apellido = "Meneses";
        $alguien->nombre_usuario = "paco";
        $alguien->contraseña = Hash::make('1234');
        $alguien->rol='Cliente';
        $alguien->fecha_nacimiento = "2001-05-01";
        $alguien->direccion = "Avenida siempre viva";
        $alguien->email = "pacom@gmail.com";
        $alguien->telefono = "9611506184";
        $alguien->save();
        
        $alguien = new Usuario;
        $alguien->nombre = "Luis";
        $alguien->apellido = "Morales";
        $alguien->nombre_usuario = "luis";
        $alguien->contraseña = Hash::make('1234');
        $alguien->rol='Cliente';
        $alguien->fecha_nacimiento = "2001-06-01";
        $alguien->direccion = "Calle de las petunias";
        $alguien->email = "luism@gmail.com";
        $alguien->telefono = "9611506185";
        $alguien->save();

        //un gerente carlos
        $alguien = new Usuario;
        $alguien->nombre = "Carlos";
        $alguien->apellido = "Morales";
        $alguien->nombre_usuario = "carlos";
        $alguien->contraseña = Hash::make('1234');
        $alguien->rol='Gerente';
        $alguien->fecha_nacimiento = "2001-08-01";
        $alguien->direccion = "Direccion conocida";
        $alguien->email = "CarlosM@gmail.com";
        $alguien->telefono = "9611506180";
        $alguien->save();
    }
}
