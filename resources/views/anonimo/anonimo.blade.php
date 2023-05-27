@extends('plantillas.menuGerente')
@section('titulo')
Salón Eventos
@endsection
@section('estilos')
<link rel="stylesheet" href="/css/styleMenuClnt.css">
<link rel="stylesheet" href="/css/styleAnonimo.css">
@endsection

@section('titulobar')
Salón de Eventos
@endsection

@section('opcionesDerecha')
<li><a class="dropdown-item" href="{{ route('login') }}">Iniciar Sesion</a></li>
<li><a class="dropdown-item" href="{{ route('registrarse') }}">Registrarse</a></li>
@endsection

@section('contenido')
<div>
    @php
        $paquetes = $paquetes->where('activo',1);
    @endphp
    <div class="container-items">
        @foreach ($paquetes as $paquete)
        <a href="{{ route('login') }}" style="text-decoration: none; color:black;">
            <div class="item">
                <figure>
                    @foreach ($paquete->imagenes as $item)
                    <img src={{$item->ruta }} alt="bodas">
                    @endforeach
                    <div class="capa" style="margin-top: -12.5rem;">
                        <p class="Descripcion">{{ $paquete->descripcion }} </p>
                    </div>
                </figure>
                <div class="info-producto">
                    <h2>{{ $paquete->nombre }}</h2>
                    <!--<p class="Descripcion">{{ $paquete->descripcion }} </p> -->
                   <!-- <button class="añade-carrito">Cotizar</button>-->

                </div>
            </div>
        </a>
        @endforeach

    </div>


@endsection

