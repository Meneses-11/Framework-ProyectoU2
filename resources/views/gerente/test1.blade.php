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
        use App\Models\Paquete;
        $paquetes = Paquete ::all();
        $paquetes = $paquetes->where('activo',1);
    @endphp
    <div class="container-items">
        @foreach ($paquetes as $paquete)
        <a href="{{ route('login') }}" style="text-decoration: none; color:black;">
            <div class="item">


                    <figure>
                        {{--<div class="slider">
                              @foreach ($paquete->imagenes as $item)
                                <div class="slide" style="background: red">
                                    <img src={{$item->ruta }} alt="bodas" style= "margin: 0">
                                </div>
                            @endforeach
                        </div>--}}
                    </figure>

            </div>
        </a>
        @endforeach

    </div>
 </div>

@endsection


