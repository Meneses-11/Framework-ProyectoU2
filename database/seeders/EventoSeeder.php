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
        //
        $evento = new Evento;
        $evento->id_usuario = 1;
        $evento->id_paquete = 1;
        $evento->precio = 10000;
        $evento->fecha = "2023-04-25";
        $evento->hora_inicio = "22:00";
        $evento->hora_fin = "04:30";
        $evento->descripcion = "Celebrare mi boda";
        $evento->num_personas = 150;
        $evento->save();

        $evento = new Evento;
        $evento->id_usuario = 2;
        $evento->id_paquete = 1;
        $evento->precio = 15000;
        $evento->fecha = "2023-05-10";
        $evento->hora_inicio = "22:00";
        $evento->hora_fin = "06:30";
        $evento->descripcion = "Celebraremos la boda de mi primo";
        $evento->num_personas = 300;
        $evento->save();

        $evento = new Evento;
        $evento->id_usuario = 2;
        $evento->id_paquete = 3;
        $evento->precio = 5000;
        $evento->fecha = "2023-05-20";
        $evento->hora_inicio = "12:00";
        $evento->hora_fin = "17:00";
        $evento->descripcion = "Celebraremos el cumpleaños numero 10 de mi hijo";
        $evento->num_personas = 50;
        $evento->save();

        $evento = new Evento;
        $evento->id_usuario = 2;
        $evento->id_paquete = 4;
        $evento->precio = 8000;
        $evento->fecha = "2023-05-17";
        $evento->hora_inicio = "12:00";
        $evento->hora_fin = "17:30";
        $evento->descripcion = "Bautizaremos a mi sobrinito";
        $evento->num_personas = 80;
        $evento->save();

        $evento = new Evento;
        $evento->id_usuario = 3;
        $evento->id_paquete = 2;
        $evento->precio = 12000;
        $evento->fecha = "2023-06-17";
        $evento->hora_inicio = "22:00";
        $evento->hora_fin = "03:30";
        $evento->descripcion = "Mi hija llega a sus xv añosy lo haremos en grande";
        $evento->num_personas = 250;
        $evento->save();


    }
}
