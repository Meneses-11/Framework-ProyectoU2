@extends('plantillas.menuGerente')
@section('estilos')
    <link rel="stylesheet" href="/css/styleBars.css">
    <link rel="stylesheet" href="/css/styleMenuClnt.css">
    <link rel="stylesheet" href="/css/stylePaquetes.css">
@endsection
@section('titulo')
    Nuevo Evento
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
    <li class="nav-item active" style="color: white;">Mis eventos</li>
@endsection
@section('opcionesDerecha')
    <li><a class="dropdown-item" href="{{ route('login') }}">Cerrar Sesión</a></li>
@endsection

@section('contenido')
    <div class="contPrinc">
        <form action="{{route('evento.update', $evento->id_evento)}}" method="POST">
                @method('PUT')
                @csrf
            <div class="prinAgregar">
                <div class="contDesc">
                    <div class="titleGuardar">
                        <h1>Editar Evento {{ $evento->id_evento }}</h1>
                    </div>
                    <div class="formu1">
                        <div class="desCont">
                            <label for="infor">Paquete:</label>
                            <!--  <input type="text" name="paqEvnt" id="infor" placeholder="Paquetes del Evento"> -->
                            <select class="selectPaq" name="idPaquete" required placeholder="Elige una opcion">
                                @foreach ($paquetes as $nombre => $id)
                                    <option value="{{ $id }}" @if ($evento->id_paquete == $id) selected @endif>{{ $nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="desCont">
                            <label for="infor">Servicio:</label>
                            <!--  <input type="text" name="paqEvnt" id="infor" placeholder="Paquetes del Evento"> -->
                            <select class="selectPaq" name="idServicio" required placeholder="Elige una opcion">
                                @if (empty($evento->id_servicio))
                                    <option value="">Ninguno</option>
                                    @foreach ($servicios as $nombre => $id)
                                        <option value="{{ $id }}">{{ $nombre }}</option>
                                    @endforeach
                                @else
                                    @foreach ($servicios as $nombre => $id)
                                        <option value="{{ $id }}" @if ($evento->id_servicio == $id) selected @endif>{{ $nombre }}</option>
                                    @endforeach
                                    <option value="">Ninguno</option>
                                @endif
                            </select>
                        </div>
                        <div class="desCont">
                            <label for="infor">N. Personas:</label>
                            <input type="number" name="numPersonas" id="infor" value="{{ $evento->num_personas }}">
                        </div>
                        <div class="desCont">
                            <label for="infor">Fecha:</label>
                            <input type="date" name="fecha" id="infor" value="{{ $evento->fecha }}">
                        </div>
                        <div class="desCont">
                            <label for="infor">Descripción:</label>
                            <input type="text" name="descripcion" id="infor" value="{{ $evento->descripcion }}">
                        </div>
                        <div class="desHora">
                            <label for="infor">Hr. Inicio:</label>
                            <input type="time" name="hrIni" id="infor" value="{{ $evento->hora_inicio }}">
                            <label for="infor">Hr. Fin:</label>
                            <input type="time" name="hrFin" id="infor" value="{{ $evento->hora_fin }}">
                        </div>
                        <div class="desCont">
                            <label for="infor">Precio:</label>
                            <input type="number" name="precio" id="infor" value="{{ $evento->precio }}">
                        </div>
                        
                    </div>
                    <div class="btnGuardar">
                        <input class="custom-btn btn-13" type="submit" value="Actualizar">
                        <input class="btn btn-danger" type="button" value="Cancelar" onclick="window.location.href='{{ route('evento.index') }}'">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection