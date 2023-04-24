@extends('plantillas.menuGerente')
@section('estilos')
    <link rel="stylesheet" href="/css/styleMenuClnt.css">
@endsection
@section('titulo')
    Nuevo Evento
@endsection
@section('links')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Space+Grotesk&display=swap" rel="stylesheet">
@endsection
@section('titulobar')
Cliente
@endsection
@section('opcionesIzquierda')
    <li class="nav-item active" style="color: white;">Mis eventos</li>
@endsection
@section('opcionesDerecha')
    <li><a class="dropdown-item" href="{{ route('cerrar_sesion') }}">Cerrar Sesión</a></li>
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
                            <select class="selectPaq" name="idPaquete" required placeholder="Elige una opcion">
                                @foreach ($paquetes as $paq)
                                    <option value="{{ $paq->id_paquete }}" @if ($evento->id_paquete == $paq->id_paquete) selected @endif>{{ $paq->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="desCont">
                            <label for="infor">Servicio:</label>
                            <select class="selectPaq" name="idServicio" required placeholder="Elige una opcion">
                                @if (empty($evento->id_servicio))
                                    <option value="">Ninguno</option>
                                    @foreach ($servicios as $servi)
                                        <option value="{{ $servi->id_servicio }}">{{ $servi->nombre }}</option>
                                    @endforeach
                                @else
                                    @foreach ($servicios as $servi)
                                        <option value="{{ $servi->id_servicio }}" @if ($evento->id_servicio == $servi->id_servicio) selected @endif>{{ $servi->nombre }}</option>
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
                            <label for="infor" name="preci" id="preci">{{ $evento->precio }}</label>
                            <input type="hidden" name="precio" id="preciTot" value="{{ $evento->precio }}">
                        </div>

                        <script>
                            // Obtener los select
                            var paqueteSelect = document.getElementsByName("idPaquete")[0];
                            var servicioSelect = document.getElementsByName("idServicio")[0];

                            // Obtener los valores de paquetes y servicios (laravel genera un objeto de selección de laravel)
                            var paquetes = {!! json_encode($paquetes->toArray()) !!};  //por eso lo convertimos a un formato que pueda reconocer JavaScript
                            var servicios = {!! json_encode($servicios->toArray()) !!};

                            // Asignar un evento a los select para detectar cambios
                            paqueteSelect.addEventListener("change", actualizarResultado);
                            servicioSelect.addEventListener("change", actualizarResultado);

                            // Función que actualiza el contenido del label con los valores seleccionados
                            function actualizarResultado() {
                                var paqueteSeleccionado = paqueteSelect.value;  //obtenemos el valor del paquete
                                var servicioSeleccionado = servicioSelect.value;//obtenemos el valor del servicio
                                var precPaq = 0;
                                var precServ = 0;

                                paquetes.forEach(function(paquet){ //recorremos los paquetes
                                    if(paquet['id_paquete'] == paqueteSeleccionado){ //comparamos con el id del escogido
                                        precPaq = paquet['precio'];
                                    }
                                });
                                servicios.forEach(function(servi){
                                    if(servi['id_servicio'] == servicioSeleccionado){
                                        precServ = servi['precio'];
                                    }
                                });
                                var tot = precPaq + precServ;
                                document.getElementById("preci").innerHTML = tot;
                                document.getElementById("preciTot").value = tot;

                            }
                        </script>

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
