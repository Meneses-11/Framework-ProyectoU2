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
<div class="contentEmpresa ">
    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="imgLogo">
    <div style="font-weight: bold;">Salón de Eventos</div>
</div>
@endsection
@section('opcionesDerecha')

<li><a class="dropdown-item" href="{{ route('login') }}">Cerrar Sesion</a></li>
@endsection

@section('contenido')

    <div class="slider-imagen">
        <div class="slide">
            <img src='img\bodas.jpeg' alt="bodas">
        </div>
    </div>
        <div class="info-producto">
            <h2>{{ $paquete->nombre }}</h2>
            <p class="Descripcion">{{ $paquete->descripcion }} </p>
            <!-- <button class="añade-carrito">Cotizar</button>-->
        </div>

@endsection
