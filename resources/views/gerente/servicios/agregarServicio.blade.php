@extends('plantillas.menuGerente')

@section('titulo')
Paquetes
@endsection
@section('titulobar')
Admin Gerente Servicios
@endsection
@section('estilos')
  @can('viewAny', App\Models\Servicio::class)
    <link rel="stylesheet" href="/css/styleTabla.css">
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />t>
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
                    <h1 class="text-center">Agregar Servicios</h1>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('servicio.llenar') }}" method="POST">
                        @csrf
                      <div class="mb-3">
                        <label for="name" class="form-label">Nombre del servicio:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresa el nombre del servicio" required>
                      </div>

                          <div class="mb-3">
                            <label for="price">Precio:</label>
                            <input type="number" class="form-control" id="precio" placeholder="Ingresa el precio del servicio" name="precio" step="0.01" min="0.00">
                          </div>

                      <div class="mb-3">
                        <label for="email" class="form-label">Descripción:</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Escribe una descripción del servicio" required>
                      </div>
                      <div class="mb-3">
                        <label for="imgs" class="form-label">Imagenes:</label>
                        <input class="form-control" type="file" name="images" id="archivoPaquete" accept="image/*" multiple>
                        @error('images')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                      <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-dark btn-block">Registrar servicio</button>
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
