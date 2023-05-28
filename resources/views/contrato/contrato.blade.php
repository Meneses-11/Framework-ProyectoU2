
@extends('plantillas.menuGerente')

@section('titulo')
Contrato
@endsection

@section('titulobar')
Contrato de Servicios
@endsection
@section('estilos')
	<link rel="stylesheet" href="/css/styleContrato.css">
	<link rel="stylesheet" href="/css/styleMenuClnt.css">
@endsection

@section('opcionesIzquierda')

@endsection
@section('opcionesDerecha')
	<li><a class="dropdown-item" href="{{ route('cerrar_sesion') }}">Cerrar Sesión</a></li>
@endsection
@section('contenido')

	@can('viewAny', App\Models\Evento::class)

		<div class="card text-center" style="margin: 8% 18% 0 18%">
			<h2 class="card-header">Estado de cuenta</h2>
			<div class="card-body">
				<div class="row">
					<div class="accordion col-md-6" id="accordionExample">
						@php
							$indice = 0;
							$totAbono = 0;
						@endphp
						@foreach ($evento->pagos as $abono)
							@php
								$totAbono += $abono->cantidad;
							@endphp
							<div class="accordion-item">
								<h2 class="accordion-header">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$abono->id_pago}}" aria-expanded="false" aria-controls="collapse{{$abono->id_pago}}">
										Abono {{$indice += 1}}
									</button>
								</h2>
								<div id="collapse{{$abono->id_pago}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
									<div class="accordion-body">
										<div class="row">
											<div class="col-md-12">
												<strong><h2>Id Abono: {{ $abono->id_pago }}</h2></strong>
											</div>

											<div class="col-md-6">
												<label class="form-label">Fecha de Pago:</label>
											</div>
											<div class="col-md-6">
												<label class="form-label">Hora de Pago:</label>
											</div>

											<div class="input-group mb-3">
												<input type="text" class="form-control" disabled style="background-color: white">
												<span class="input-group-text">@</span>
												<input type="text" class="form-control" disabled style="background-color: white">
											</div>

											<div class="col-md-12"><h4 style="color: black !important">Cliente</h4></div>
											<div class="input-group col-md-12 mb-4">
												<span class="input-group-text">First & Last name</span>
												<input type="text" aria-label="First name" class="form-control" value="{{ $evento->usuario->nombre }}" disabled style="background-color: white">
												<input type="text" aria-label="Last name" class="form-control" value="{{ $evento->usuario->apellido }}" disabled style="background-color: white">
											</div>

											<div class="input-group col-md-6" style="padding: 0% 20%">
												<span class="input-group-text"><h4 style="color: black !important">$</h4></span>
												<label class="form-control" aria-label="Amount (to the nearest dollar)"><h4 style="color: black !important">{{ $abono->cantidad }}</h4></label>
												<span class="input-group-text"><h4 style="color: black !important">.00</h4></span>	
											</div>

										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
					
					<div class="col-md-5 border-start border-1 text-center">
						<div class="col-md-12  mb-5">
							<h2>Costo del Evento</h2>
						</div>
						<div class="input-group col-md-6" style="padding: 0% 5%">
							<span class="input-group-text"><h3 style="color: black !important">$</h3></span>
							<label class="form-control" aria-label="Amount (to the nearest dollar)"><h3 style="color: black !important">{{ $evento->precio }}</h3></label>
							<span class="input-group-text"><h3 style="color: black !important">.00</h3></span>	
						</div>
					</div>
				</div>
			</div>
				
			<div class="card-footer text-body-secondary">
				<h2>${{ $evento->precio - $totAbono}}</h2>
			</div>
		</div>
		

		<div class="sombra">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8 contenedor2">
						<div class="card-header bor">
							<h1 class="text-center">Contrato de Evento</h1>
						</div>
						<div class="card" style="box-shadow: 0px 2px 5px rgba(54, 54, 54, 1); margin-top: 1%;">
							<div class="card-body-carlos">
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

		
	@else
		@include('plantillas.error401')
	@endcan
	

@endsection



