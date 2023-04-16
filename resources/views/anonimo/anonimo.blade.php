@extends('plantillas.menuGerente')
@section('titulo')
Salón Eventos
@endsection
@section('estilos')
<link rel="stylesheet" href="/css/styleMenuClnt.css">
<link rel="stylesheet" href="/css/styleAnonimo.css">
@endsection

@section('titulobar')
<div class="contentEmpresa ">
    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="imgLogo">
    <div style="font-weight: bold;">Salón de Eventos</div>
</div>
@endsection

@section('opcionesDerecha')
<li><a class="dropdown-item" href="{{ route('login') }}">Iniciar Sesion</a></li>
@endsection

@section('contenido')
<div style="margin-top: 6rem !importan;">

    <div class="container-items">
        @foreach ($paquetes as $paquete)
        <a href="{{ route('login') }}">
            <div class="item">
                <figure>
                    <img src={{$paquete->nombre_foto }} alt="bodas">
                </figure>
                <div class="info-producto">
                    <h2>{{ $paquete->nombre }}</h2>
                    <p class="Descripcion">{{ $paquete->descripcion }} </p>
                   <!-- <button class="añade-carrito">Cotizar</button>-->
                </div>
            </div>
        </a>

        @endforeach

    </div>
 </div>
@endsection

