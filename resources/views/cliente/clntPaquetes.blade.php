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
@section('opcionesIzquierda')
    @can('anyView', App\Models\Evento::class)
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('evento.index') }}">Mis eventos</a></li>
    @endcan
@endsection
@section('opcionesDerecha')
    <li><a class="dropdown-item" href="{{ route('cerrar_sesion') }}">Cerrar Sesion</a></li>
@endsection

@section('contenido')
    @can('viewAny', App\Models\Evento::class)
        <div>
            <div class="container-items">
                @foreach ($paquetes as $paquete)
                    @can('activo', $paquete)
                        <a href="{{ route('paquete.detalle', $paquete->id_paquete) }}" style="text-decoration: none; color:black;">
                            <div class="item">
                                <figure>
                                    <div class="slyder">
                                        @foreach ($paquete->imagenes as $item)
                                            <li><img src={{ $item->ruta }} alt={{ $item->nombre }}></li>
                                        @endforeach
                                    </div>
                                    <div class="capa" style="margin-top: -12.5rem;">
                                        <p class="Descripcion">{{ $paquete->descripcion }}</p>
                                    </div>
                                </figure>
                                <div class="info-producto">
                                    <h2>{{ $paquete->nombre }}</h2>
                                    <!--<p class="Descripcion">{{ $paquete->descripcion }} </p> -->
                                <!-- <button class="añade-carrito">Cotizar</button>-->

                                </div>
                            </div>
                        </a>    
                    @endcan
                
                @endforeach

            </div>
        </div>
    @else
        @include('plantillas.error401')
    @endcan

@endsection
