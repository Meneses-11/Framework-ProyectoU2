@extends('plantillas.menuGerente')

@section('estilos')
    <link rel="stylesheet" href="/css/styleBars.css">
    <link rel="stylesheet" href="/css/styleMenuClnt.css">
    <link rel="stylesheet" href="/css/stylePaquetes.css">
@endsection

@section('titulo')
    Cliente
@endsection

@section('links')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Space+Grotesk&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
@endsection

@section('titulobar')
    <div class="contentEmpresa ">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="imgLogo">
        <div style=" font-weight: bold;">Cliente</div>
    </div>
@endsection
@section('opcionesIzquierda')
    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('paquetes')}}">Paquetes</a></li>
    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('evento.index') }}">Mis eventos</a></li>
    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('informacion')}}">Informacion</a></li>
@endsection
@section('opcionesDerecha')
    <li><a class="dropdown-item" href="{{ route('login') }}">Cerrar Sesión</a></li>
@endsection

@section('contenido')
    <div class="contPrinc">
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

    </div>
    
@endsection
