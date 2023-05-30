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
    @can('viewAny', App\Models\Evento::class)
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('evento.index')}}">Mis eventos</a></li>        
    @endcan
@endsection
@section('opcionesDerecha')
    <li><a class="dropdown-item" href="{{ route('cerrar_sesion') }}">Cerrar Sesión</a></li>
@endsection

@section('contenido')

    @can('viewAny', App\Models\Evento::class)

        <div class="contPrinc">
            <div class="row justify-content-center align-items-center" style="margin-top: 7rem">
                <div class="col-lg-6" style="width: 60rem">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-header" style="border-radius: 15px 15px 0 0;">
                            <h1 class="text-center">Nuevo Evento</h1>
                        </div>
                        <div class="card-body row g-3">
                            <form action="{{ route('evento.store') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label for="colFormLabelLg" class="col-sm-3 col-form-label col-form-label-lg">Nombre del Evento:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-lg" id="colFormLabelLg" placeholder="Ingrese el Nombre de su evento..." name="nombre" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Paquete:</label>
                                                <select class="form-select" name="idPaquete" required>
                                                    <option value="">Seleccione un paquete</option>
                                                    @foreach ($paquetes as $paq)
                                                        <option value="{{ $paq->id_paquete }}"  
                                                            @if (isset($paquete))
                                                                @if ( $paq->id_paquete == $paquete->id_paquete)
                                                                    selected
                                                                @endif
                                                            @endif 
                                                        >{{ $paq->nombre }}</option>
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
                                        @foreach ($servicios as $serv)
                                            <div class="form-check">
                                                <input class="form-check-input" name="idServicio[]" type="checkbox" value="{{ $serv->id_servicio }}" id="servicio-{{ $serv->id_servicio }}">
                                                <label class="form-check-label" for="servicio-{{ $serv->id_servicio }}">
                                                    {{ $serv->nombre }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="row mb-3">
                                            <div class="col-sm">
                                                <label class="form-label">Fecha:</label>
                                                <input type="date" name="fecha" class="form-control" placeholder="Fecha de Evento" aria-label="City" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm">
                                                <label class="form-label">Hora Inicio:</label>
                                                <input type="time" class="form-control" name="hrIni" required>
                                            </div>
                                            <div class="col-sm">
                                                <label class="form-label">Hora Fin:</label>
                                                <input type="time" class="form-control" name="hrFin" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-3">

                                    <div class="col-sm-8 align-self-center">
                                        <label class="form-label">Descripción:</label>
                                        <textarea class="form-control" name="descripcion" rows="3" required></textarea>
                                    </div>

                                    <div class="col-sm-4 text-center align-self-center">
                                        <label class="form-label">Total:</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">$</span>
                                            <label class="form-control" name="preci" id="preci">
                                                @if (isset($paquete))
                                                    @if ($paquete->id_paquete!=null)
                                                        {{ $paquete->precio }}
                                                    @endif    
                                                @endif
                                            </label>
                                            <span class="input-group-text">.00</span>
                                            <input type="hidden" name="precio" id="preciTot" 
                                                @if (isset($paquete))
                                                    @if ($paquete->id_paquete!=null)
                                                        value="{{ $paquete->precio }}"
                                                    @else 
                                                        value="" 
                                                    @endif
                                                @else
                                                    value=""
                                                @endif
                                            >
                                        </div>
                                    </div>

                                </div>

                                <!-- ////////////////////////////// -->
                                
                                <script>
                                    // Obtener los select
                                    var paqueteSelect = document.getElementsByName("idPaquete")[0];
                                    var serviChbox = document.querySelectorAll('input[name="idServicio[]"]');
                                
                                    // Obtener los valores de paquetes y servicios (el método pluck genera un objeto de selección de laravel)
                                    var paquetes = {!! json_encode($paquetes->toArray()) !!};  //por eso lo convertimos a un formato que pueda reconocer JavaScript
                                    var servicios = {!! json_encode($servicios->toArray()) !!};
                                
                                    // Asignar un evento a los select para detectar cambios y a cada checkbox
                                    paqueteSelect.addEventListener("change", actualizarResultado);
                                    serviChbox.forEach(function (checkbox) {
                                        checkbox.addEventListener("change", actualizarResultado);
                                    });
                                
                                    // Función que actualiza el contenido del label con los valores seleccionados
                                    function actualizarResultado() {
                                        var paqueteSeleccionado = paqueteSelect.value;
                                        var serviciosSeleccionados = [];

                                        serviChbox.forEach(function(checkbox) {
                                            if (checkbox.checked) {
                                                serviciosSeleccionados.push(checkbox.value);
                                            }
                                        });

                                        var precPaq = 0;
                                        var precServ = 0;

                                        paquetes.forEach(function(paquet){
                                            if(paquet['id_paquete'] == paqueteSeleccionado){
                                                precPaq = paquet['precio'];
                                            }
                                        });

                                        serviciosSeleccionados.forEach(function(idServicio) {
                                            servicios.forEach(function(servicio) {
                                                if (servicio['id_servicio'] == idServicio) {
                                                    precServ += servicio['precio'];
                                                }
                                            });
                                        });

                                        var tot = precPaq + precServ;
                                        document.getElementById("preci").innerHTML = tot;
                                        document.getElementById("preciTot").value = tot;
                                    }

                                    
                                    // Llamar a actualizarResultado al cargar la página
                                    actualizarResultado();
                                
                                </script>
                                
                                <!-- ////////////////////////////// -->

                                <div class="row mb-3">
                                    <div class="col-sm-6 d-grid gap-2">
                                        <button type="submit" class="btn btn-dark btn-block">Crear Evento</button>
                                    </div>
                                    <div class="col-sm-6 d-grid gap-2">
                                        <button type="button" class="btn btn-secondary btn-block mt-2" onclick="window.location.href='{{ route('evento.index') }}'">Cancelar</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else
        @include('plantillas.error401')
    @endcan

@endsection
