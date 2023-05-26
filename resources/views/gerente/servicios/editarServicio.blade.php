@extends('plantillas.menuGerente')

@section('titulo')
Paquetes
@endsection
@section('titulobar')
Admin Gerente Servicios
@endsection
@section('estilos')
  @can('viewAny', pp\Models\Servicio::class)
    <link rel="stylesheet" href="/css/styleTabla.css">    
  @else
    <link rel="stylesheet" href="/css/styleMenuClnt.css">
  @endcan
@endsection
@section('opcionesIzquierda')
  @can('viewAny', App\Models\Servicio::class)
    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('usuario.inicio') }}">Administrar Usuarios</a></li>
    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('paquete.index') }}">Administrar Paquetes</a></li>
    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('servicio.inicio') }}">Administrar Servicios</a></li>
  @endcan
@endsection
@section('opcionesDerecha')
<li><a class="dropdown-item" href="{{ route('cerrar_sesion') }}">Cerrar Sesión</a></li>
@endsection

@can('viewAny', App\Models\Servicio::class)
  @section('contenido')
    <div class="centrar" style="margin-top: 7rem;">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h1 class="text-center">Agregar Servicio</h1>
              </div>
              <div class="card-body">
                <form action="{{ route('servicio.actualizar',$servicio->id_servicio) }}" method="POST">
                    @csrf
                    @method('PUT')
                  <div class="mb-3">
                    <label for="name" class="form-label">Nombre del servicio:</label>
                    <input type="text" value="{{ $servicio->nombre }}" id="nombre" name="nombre" class="form-control" required>
                  </div>

                  <div class="mb-3">
                    <label for="price">Precio:</label>
                    <input type="number" value="{{ $servicio->precio }}" class="form-control" id="precio" name="precio" step="0.01" min="0.00">
                </div>

                  <div class="mb-3">
                    <label for="email" class="form-label">Descripción:</label>
                    <input type="text" value="{{ $servicio->descripcion }}" id="descripcion" name="descripcion" class="form-control" placeholder="Ingresa o selecciona tu fecha de nacimiento" required>
                  </div>

                  <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-dark btn-block">Actualizar servicio</button>
                    <button type="button" class="btn btn-secondary btn-block mt-2" onclick="window.location.href='{{ route('servicio.inicio') }}'">Cancelar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
@else
    @include('plantillas.error401')
@endcan