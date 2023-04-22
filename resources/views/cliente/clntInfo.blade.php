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
    <div style="font-weight: bold;">Salón de Eventos</div>
</div>
@endsection
@section('opcionesDerecha')

<li><a class="dropdown-item" href="{{ route('login') }}">Cerrar Sesion</a></li>
@endsection

@section('contenido')

    <div class="slider-imagen">
        <div class="slide">
            <img src='{{ $paquete->nombre_foto }}' alt="bodas">
        </div>
    </div>
        <div class="info-producto">
            <h2>{{ $paquete->nombre }}</h2>
            <p class="Descripcion">{{ $paquete->descripcion }} </p>
            <!-- <button class="añade-carrito">Cotizar</button>-->
        </div>

        <button class="custom-btn btn-13" ><a href="{{route('evento.create')}}" style="color: white !important; text-decoration: none;">Crear este Evento</a></button>

@endsection
