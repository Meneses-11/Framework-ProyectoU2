
@extends('plantillas.menuGerente')

@section('titulo')
Imagenes
@endsection
@section('titulobar')
Admin Gerente Eventos-Imagenes
@endsection
@section('estilos')

    <style>

    </style>
@endsection
@section('opcionesIzquierda')
    @can('viewAny', App\Models\Servicio::class)
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('usuario.inicio') }}">Administrar Usuarios</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('paquete.index') }}">Administrar Paquetes</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('servicio.inicio') }}">Administrar Servicios</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('evento.mostrar') }}">Administrar Eventos</a></li>
    @endcan
@endsection
@section('opcionesDerecha')
<li><a class="dropdown-item" href="{{ route('cerrar_sesion') }}">Cerrar Sesión</a></li>
@endsection

@can('viewAny', App\Models\Servicio::class)
    @section('contenido')
@php

@endphp
<div class="container mt-5">
    <div class="row">
        @foreach ($imagenes as $im)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <img class="card-img-top" src="{{ $im->ruta }}" alt="" style="height: 100%; object-fit: cover;">
                    @auth
                        <div class="card-footer">
                            <form class="eliminar-alert" method="post" action="{{ route('imagen.destroy', $im->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
</div>


        <!-- Modal de confirmación para eliminar usuario -->


    @endsection
    @section('scripts')
    @if (session('eliminado') == 'si')
    <script>
            alert('Se elimino correctamente la imagen');
    </script>
    {{ Session::forget('eliminado') }}
    @endif
    @endsection
@else
    @include('plantillas.error401')
@endcan




