@extends('plantillas.menuCliente')
@section('contenido')

    <div class="container-items">
        <div class="item">
            <figure>
                <img src="img\bodas.jpeg" alt="bodas">
            </figure>
            <div class="info-producto">
                <h2>Paquete bodas</h2>
                <p class="Descripcion">Decoramos el salon conforme a lo que estas buscando </p>
               <!-- <button class="añade-carrito">Cotizar</button>-->
            </div>
        </div>
        <div class="item">
            <figure>
                <img src="img\fiestas-adultos.jpg" alt="travis1">
            </figure>
            <div class="info-producto">
                <h2>Paquete Cumpleaños</h2>
                <p class="Descripccion">cumpleñoas adultos</p>
                <!-- <button class="añade-carrito">Añadir al carrito </button>-->
            </div>
        </div>
        <div class="item">
            <figure>
                <img src="img\fiesta-niños.jpg" alt="pelucheg">
            </figure>
            <div class="info-producto">
                <h2>Paquete cumpleaños niños</h2>
                <p class="Descripcio">El salon se entrega con decoraciones para niño dependiendo
                    de la tematica seleccionada
                </p>
                <!-- <button class="añade-carrito">Añadir al carrito </button>-->
            </div>
        </div>
        <div class="item">
            <figure>
                <img src="img\Vacio.jpg" alt="travis2">
            </figure>
            <div class="info-producto">
                <h2>Salon eventos vacio</h2>
                <p class="Descripcion">El salon se renta vacio
                     sin ningun tipo de decoracion </p>
                <!-- <button class="añade-carrito">Añadir al carrito </button>-->
            </div>
        </div>
        <div class="item">
            <figure>
                <img src="img\salon-vacio-decoracion.jpg" alt="off">
            </figure>
            <div class="info-producto">
                <h2>Salon eventos Fiestas libre con decoraciones</h2>
                <p class="Descripcion">El salon se renta con decoraciones libres y con sillas y mesas</p>
                <!-- <button class="añade-carrito">Añadir al carrito </button>-->
            </div>
        </div>
        <div class="item">
            <figure>
                <img src="img\xv-años.jpg" alt="peluchey">
            </figure>
            <div class="info-producto">
                <h2>Salon eventos XV años</h2>
                <p class="Descripccion">El salon se entrega con decoraciones para XV años
                    dependiendo el color seleccionado
                </p>
                <!-- <button class="añade-carrito">Añadir al carrito </button>-->
            </div>
        </div>
    </div>

    <input class = 'salir' type="button" value="salir" onClick="history.go(-1);">

@endsection
