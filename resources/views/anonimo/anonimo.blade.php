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
@endsection

@section('contenido')
<div>
    <div class="container-items">
        @foreach ($paquetes as $paquete)
        <a href="{{ route('login') }}" style="text-decoration: none; color:black;">
            <div class="item">
                <figure>
                    <img src={{$paquete->nombre_foto }} alt="bodas">
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
 </div>
@endsection

