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
        $paquete->precio = 6599.99;
        $paquete->activo = true;
        $paquete->descripcion = "¡Felicidades por su compromiso! ¿Está buscando el lugar perfecto para celebrar su boda? Nuestro salón para bodas es el lugar ideal para que usted y sus invitados creen recuerdos inolvidables.";
        //$paquete->nombre_foto = "\img\bodas.jpeg";
        $paquete->save();

        $paquete = new Paquete;
        $paquete->nombre = "XV Años";
        $paquete->precio = 5999.99;
        $paquete->activo = true;
        $paquete->descripcion = "¡Celebre su gran día con estilo en nuestro salón para XV años! Nuestro salón es el lugar ideal para una fiesta inolvidable que marque el comienzo de una nueva etapa en la vida. Con un ambiente sofisticado y elegante, nuestro salón es perfecto para albergar una gran celebración rodeada de amigos y familiares.";
        //$paquete->nombre_foto = "\img\xv-años.jpg";
        $paquete->save();

        $paquete = new Paquete;
        $paquete->nombre = "Fiesta infantil";
        $paquete->precio = 4599.99;
        $paquete->activo = true;
        $paquete->descripcion = "¡Haga que el cumpleaños de su hijo sea mágico en nuestro salón para fiestas infantiles! Nuestro salón está diseñado para proporcionar un ambiente seguro y divertido para que los niños disfruten de su gran día rodeados de amigos y familiares.";
       // $paquete->nombre_foto = '\img\fiesta-niños.jpg';
        $paquete->save();

        $paquete = new Paquete;
        $paquete->nombre = "Bautizos";
        $paquete->precio = 4599.99;
        $paquete->activo = true;
        $paquete->descripcion = "¡Celebre un día especial en nuestro salón para bautizos! Nuestro salón es el lugar ideal para un evento íntimo y acogedor para celebrar la bendición del bautizo de su hijo o hija. Ofrecemos una atmósfera tranquila y relajada para que usted y sus invitados disfruten del momento y creen recuerdos inolvidables.";
        //$paquete->nombre_foto = '\img\fiestas-adultos.jpg';
        $paquete->save();


    }
}
