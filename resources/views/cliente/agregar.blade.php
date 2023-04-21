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
    <li><a class="dropdown-item" href="{{ route('login') }}">Cerrar Sesión</a></li>
@endsection

@section('contenido')

    <div class="contPrinc">
        <form action="{{route('evento.store')}}" method="POST">
                @csrf
            <div class="prinAgregar">
                <div class="contDesc">
                    <div class="titleGuardar">
                        <h1>Nuevo Evento</h1>
                    </div>
                    <div class="formu1">
                        <div class="desCont">
                            <label for="infor">Paquete:</label>
                            <select id="paqueteSelect" class="selectPaq" name="idPaquete" required>
                                <option value="">Seleccione un paquete</option>
                                @foreach ($paquetes as $paq)
                                    <option value="{{ $paq->id_paquete }}">{{ $paq->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="desCont">
                            <label for="infor">Servicio:</label>
                            <select id="servicioSelect" class="selectPaq" name="idServicio">
                                <option value="">Ninguno</option>
                                @foreach ($servicios as $servi)
                                    <option value="{{ $servi->id_servicio }}">{{ $servi->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="desCont">
                            <label for="infor">N. Personas:</label>
                            <input type="number" name="numPersonas" id="infor" placeholder="Numero de Personas">
                        </div>
                        <div class="desCont">
                            <label for="infor">Fecha:</label>
                            <input type="date" name="fecha" id="infor" placeholder="Fecha de Evento">
                        </div>
                        <div class="desHora">
                            <label for="infor">Hr. Inicio:</label>
                            <input type="time" name="hrIni" id="infor">
                            <label for="infor">Hr. Fin:</label>
                            <input type="time" name="hrFin" id="infor">
                        </div>
                        <div class="desCont">
                            <label for="infor">Descripción:</label>
                            <input type="text" name="descripcion" id="infor" placeholder="Descripción del Evento">
                        </div>
                        <div class="desCont">
                            <label for="infor">Precio:</label>
                            <label for="infor" name="preci" id="preci"></label>
                            <input type="hidden" name="precio" id="preciTot" value="">
                        </div>

                        <script>
                            // Obtener los select
                            var paqueteSelect = document.getElementsByName("idPaquete")[0];
                            var servicioSelect = document.getElementsByName("idServicio")[0];

                            // Obtener los valores de paquetes y servicios (el método pluck genera un objeto de selección de laravel)
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
                        <input class="custom-btn btn-13" type="submit" value="SEND">
                        <button type="button" class="btn btn-danger btn-block mt-2" onclick="window.location.href='{{ route('evento.index') }}'">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div class="contPrinc">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6" style="width: 60rem">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-header" style="border-radius: 15px 15px 0 0;">
                        <h1 class="text-center">Nuevo Servicio</h1>
                    </div>
                    <div class="card-body row g-3">
                        <form action="{{ route('evento.store') }}" method="POST">
                            @csrf

                            <div class="row mb-3">

                                <div class="col-sm-4">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label class="form-label">Paquete:</label>
                                            <select class="form-select" id="paqueteSelect" name="paqueteSelect" required>
                                                <option value="">Seleccione un paquete</option>
                                                @foreach ($paquetes as $paq)
                                                    <option value="{{ $paq->id_paquete }}">{{ $paq->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="name" class="form-label">Numero de Personas:</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping">Num</span>
                                                <input type="number" id="numPersonas" name="numPersonas" class="form-control" placeholder="Numero de Personas" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 align-self-center text-center">
                                    <label class="form-label">Servicios</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Manteleria
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Meseros
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="row mb-3">
                                        <div class="col-sm">
                                            <label class="form-label">Fecha:</label>
                                            <input type="date" name="fecha" class="form-control" placeholder="Fecha de Evento" aria-label="City">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm">
                                            <label class="form-label">Hora Inicio:</label>
                                            <input type="time" class="form-control" name="hrIni">
                                        </div>
                                        <div class="col-sm">
                                            <label class="form-label">Hora Fin:</label>
                                            <input type="time" class="form-control" name="hrFin">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">

                                <div class="col-sm-8 align-self-center">
                                    <label class="form-label">Descripción:</label>
                                    <textarea class="form-control" name="descripcion" rows="3"></textarea>
                                </div>

                                <div class="col-sm-4 text-center align-self-center">
                                    <label class="form-label">Total:</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                        <label class="form-control" name="preci" id="preci"></label>
                                        <span class="input-group-text">.00</span>
                                        <input type="hidden" name="precio" id="preciTot" value="">
                                    </div>
                                </div>

                            </div>


                            <div class="row mb-3">
                                <div class="col-sm-6 d-grid gap-2">
                                    <button type="submit" class="btn btn-dark btn-block">Registrar servicio</button>
                                </div>
                                <div class="col-sm-6 d-grid gap-2">
                                    <button type="button" class="btn btn-secondary btn-block mt-2" onclick="window.location.href='{{ route('servicio.inicio') }}'">Cancelar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
