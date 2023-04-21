
@extends('plantillas.menuGerente')

@section('titulo')
Contrato
@endsection

@section('titulobar')
Contrato de Servicios
@endsection
@section('estilos')
<link rel="stylesheet" href="/css/styleContrato.css">
@endsection

@section('opcionesIzquierda')

@endsection
@section('opcionesDerecha')
<li><a class="dropdown-item" href="{{ route('login') }}">Cerrar Sesión</a></li>
@endsection
@section('contenido')

<div class="sombra">
    <div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 contenedor2">
                <div class="card-header bor">
				<h1 class="text-center">Contrato de Evento</h1>
                </div>
				<div class="card" style="box-shadow: 0px 2px 5px rgba(54, 54, 54, 1); margin-top: 1%;">
					<div class="card-body">
						<h4 class="card-title">Detalles del Evento</h4>

						<div class="row mb-3">
							<div class="col-sm-4">
								<p class="font-weight-bold">Fecha del Evento:</p>
							</div>
							<div class="col-sm-8">
								<p>{{ $evento->fecha }}</p>
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-sm-4">
								<p class="font-weight-bold">Hora de Inicio:</p>
							</div>
							<div class="col-sm-8">
								<p>{{ $evento->hora_inicio }}</p>
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-sm-4">
								<p class="font-weight-bold">Hora Planeada de Fin:</p>
							</div>
							<div class="col-sm-8">
								<p>{{ $evento->hora_fin }}</p>
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-sm-4">
								<p class="font-weight-bold">Propósito del Evento:</p>
							</div>
							<div class="col-sm-8">
								<p>{{ $evento->descripcion }}</p>
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-sm-4">
								<p class="font-weight-bold">Número de Invitados:</p>
							</div>
							<div class="col-sm-8">
								<p>{{ $evento->num_personas}}</p>
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-sm-4">
								<p class="font-weight-bold">Paquete:</p>
							</div>
							<div class="col-sm-8">
								<p>{{ $evento->paquete->nombre }}</p>
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-sm-4">
								<p class="font-weight-bold">Estatus del Evento:</p>
							</div>
							<div class="col-sm-8">
								<p>@php
                                    if($evento->confirmacion == 1 ){

                                        echo 'Confirmado';
                                    }else echo 'No Confirmado aún';
                                @endphp</p>
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-sm-4">
								<p class="font-weight-bold">Servicios Seleccionados:</p>
                            </div>
                            <div class="col-sm-8">
                                <ul>
                                    @php
                                        $collection = $evento->servicios;
                                    @endphp
                                    @foreach ($collection as $servicio)
									<li>{{ $servicio->nombre }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



