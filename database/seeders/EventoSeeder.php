<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 10 eventos (5 no deben de estar confirmados, los eventos deben estar basados en algún tipo de paquete
        //uno de los paquetes no se usará en el ejemplo sería el de las bodas, de los eventos algunos se contrataran
        //con algunos servicios, no todos los eventos usan todos los servicios)
        $evento = new Evento;
        $evento->nombre = "Evento AE1";
        $evento->id_usuario = 1;
        $evento->id_paquete = 3;
        $evento->precio = 10000;
        $evento->fecha = "2023-05-27";
        $evento->hora_inicio = "00:00";
        $evento->hora_fin = "04:30";
        $evento->descripcion = "Celebrare el cumpleaños de mi hijo";
        $evento->num_personas = 150;
        $evento->confirmacion = 1;
        $evento->save();
        $evento->servicios()->attach([2,3]);

        $evento = new Evento;
        $evento->nombre = "Evento AE2";
        $evento->id_usuario = 2;
        $evento->id_paquete = 2;
        $evento->precio = 15000;
        $evento->fecha = "2023-05-27";
        $evento->hora_inicio = "00:00";
        $evento->hora_fin = "06:30";
        $evento->descripcion = "Celebraremos los quince años de mi prima";
        $evento->num_personas = 300;
        $evento->save();
        $evento->servicios()->attach([1,3]);

        $evento = new Evento;
        $evento->nombre = "Evento AE3";
        $evento->id_usuario = 2;
        $evento->id_paquete = 3;
        $evento->precio = 5000;
        $evento->fecha = "2023-05-27";
        $evento->hora_inicio = "00:00";
        $evento->hora_fin = "17:00";
        $evento->descripcion = "Celebraremos el cumpleaños numero 10 de mi hijo";
        $evento->num_personas = 50;
        $evento->save();
        $evento->servicios()->attach([2]);

        $evento = new Evento;
        $evento->nombre = "Evento AE4";
        $evento->id_usuario = 2;
        $evento->id_paquete = 4;
        $evento->precio = 8000;
        $evento->fecha = "2023-05-27";
        $evento->hora_inicio = "00:00";
        $evento->hora_fin = "17:30";
        $evento->descripcion = "Bautizaremos a mi sobrinito";
        $evento->num_personas = 80;
        $evento->confirmacion = 1;
        $evento->save();
        $evento->servicios()->attach([3]);

        $evento = new Evento;
        $evento->nombre = "Evento AE5";
        $evento->id_usuario = 3;
        $evento->id_paquete = 2;
        $evento->precio = 12000;
        $evento->fecha = "2023-05-27";
        $evento->hora_inicio = "00:00";
        $evento->hora_fin = "03:30";
        $evento->descripcion = "Mi hija llega a sus xv años y lo haremos en grande";
        $evento->num_personas = 250;
        $evento->confirmacion = 1;
        $evento->save();
        $evento->servicios()->attach([1,2,3]);

        $evento = new Evento;
        $evento->nombre = "Evento AE6";
        $evento->id_usuario = 1;
        $evento->id_paquete = 3;
        $evento->precio = 10000;
        $evento->fecha = "2023-05-27";
        $evento->hora_inicio = "00:00";
        $evento->hora_fin = "16:30";
        $evento->descripcion = "Celebrare el cumpleaños numero 6 de mis hijos";
        $evento->num_personas = 50;
        $evento->save();
        $evento->servicios()->attach([3]);

        $evento = new Evento;
        $evento->nombre = "Evento AE7";
        $evento->id_usuario = 2;
        $evento->id_paquete = 2;
        $evento->precio = 15000;
        $evento->fecha = "2023-05-27";
        $evento->hora_inicio = "00:00";
        $evento->hora_fin = "06:30";
        $evento->descripcion = "Celebraremos los quince años de mi hermana";
        $evento->num_personas = 100;
        $evento->save();
        $evento->servicios()->attach([1,2]);

        $evento = new Evento;
        $evento->nombre = "Evento AE8";
        $evento->id_usuario = 2;
        $evento->id_paquete = 3;
        $evento->precio = 5000;
        $evento->fecha = "2023-05-27";
        $evento->hora_inicio = "00:00";
        $evento->hora_fin = "17:00";
        $evento->descripcion = "Celebraremos el cumpleaños numero 10 de mi hijo";
        $evento->num_personas = 150;
        $evento->confirmacion = 1;
        $evento->save();
        $evento->servicios()->attach([1,2,3]);

        $evento = new Evento;
        $evento->nombre = "Evento AE9";
        $evento->id_usuario = 2;
        $evento->id_paquete = 4;
        $evento->precio = 8000;
        $evento->fecha = "2023-05-27";
        $evento->hora_inicio = "00:00";
        $evento->hora_fin = "17:30";
        $evento->descripcion = "Bautizaremos a mi hijo";
        $evento->num_personas = 80;
        $evento->save();
        $evento->servicios()->attach([1,2,3]);

        $evento = new Evento;
        $evento->nombre = "Evento AE10";
        $evento->id_usuario = 3;
        $evento->id_paquete = 2;
        $evento->precio = 12000;
        $evento->fecha = "2023-05-27";
        $evento->hora_inicio = "00:00";
        $evento->hora_fin = "03:30";
        $evento->descripcion = "Mi hija llega a sus xv años y lo haremos en grande";
        $evento->num_personas = 250;
        $evento->confirmacion = 1;
        $evento->save();
        $evento->servicios()->attach([1,2,3]);
    }
}
