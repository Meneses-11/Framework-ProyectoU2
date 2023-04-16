<?php

namespace Database\Seeders;

use App\Models\Paquete;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $paquete = new Paquete;
        $paquete->nombre = "Bodas";
        $paquete->precio = 5599.99;
        $paquete->activo = true;
        $paquete->descripcion = "algo";
        $paquete->nombre_foto = "img\bodas.jpeg";
        $paquete->save();
        $paquete = new Paquete;
        $paquete->nombre = "XV Años";
        $paquete->precio = 4599.99;
        $paquete->activo = true;
        $paquete->descripcion = "algo";
        $paquete->nombre_foto = "img\xv-años.jpg";
        $paquete->save();
        $paquete = new Paquete;
        $paquete->nombre = "Fiesta infantil";
        $paquete->precio = 4599.99;
        $paquete->activo = true;
        $paquete->descripcion = "algo";
        $paquete->nombre_foto = 'img\fiesta-niños.jpg';
        $paquete->save();
        $paquete = new Paquete;
        $paquete->nombre = "Bautizos";
        $paquete->precio = 4599.99;
        $paquete->activo = true;
        $paquete->descripcion = "algo";
        $paquete->nombre_foto = 'img\fiestas-adultos.jpg';
        $paquete->save();


    }
}
