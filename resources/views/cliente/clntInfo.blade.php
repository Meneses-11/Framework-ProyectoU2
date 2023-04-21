@extends('plantillas.menuGerente')
@section('titulo')
Salón Eventos
@endsection
@section('estilos')
<link rel="stylesheet" href="/css/styleMenuClnt.css">
<link rel="stylesheet" href="/css/styleAnonimo.css">
<link rel="stylesheet" href="/css/styleInfo.css">
@endsection

@section('titulobar')
Salón de Eventos
@endsection
@section('opcionesDerecha')

<li><a class="dropdown-item" href="{{ route('login') }}">Cerrar Sesion</a></li>
@endsection

@section('contenido')

    <div class="slider-imagen">
        <div class="slide">
            <img src='/{{ $paquete->nombre_foto}}' alt="bodas">
        </div>
    </div>
        <div class="info-producto">
            <h2>{{ $paquete->nombre }}</h2>
            <p class="Descripcion">{{ $paquete->descripcion }} </p>
            <!-- <button class="añade-carrito">Cotizar</button>-->
        </div>

@endsection
