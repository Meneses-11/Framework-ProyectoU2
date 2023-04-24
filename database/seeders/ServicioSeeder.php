<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $serv = new Servicio;
        $serv->nombre = "Mantelería";
        $serv->precio = 599.99;
        $serv->descripcion = "";
        $serv->save();

        $serv = new Servicio;
        $serv->nombre = "Meseros";
        $serv->precio = 1599.99;
        $serv->descripcion = "";
        $serv->save();
        
        $serv = new Servicio;
        $serv->nombre = "Aire acondicionado";
        $serv->precio = 2599.99;
        $serv->descripcion = "";
        $serv->save();
    }
}
