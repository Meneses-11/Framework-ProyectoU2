@extends('plantillas.menuGerente')

@section('titulo')
Paquetes
@endsection
@section('titulobar')
  Admin Gerente Paquetes
@endsection
@section('estilos')
<link rel="stylesheet" href="/css/styleTabla.css">
<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
<link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />t>
@endsection
@section('opcionesIzquierda')
<li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('usuario.inicio') }}">Administrar Usuarios</a></li>
<li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('paquete.index') }}">Administrar Paquetes</a></li>
<li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('servicio.inicio') }}">Administrar Servicios</a></li>
@endsection
@section('opcionesDerecha')
<li><a class="dropdown-item" href="{{ route('cerrar_sesion') }}">Cerrar Sesión</a></li>
@endsection

@section('contenido')
<div class="centrar" style="margin-top: 7rem">
    <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h1 class="text-center">Agregar Paquetes</h1>
              </div>
              <div class="card-body">
                <form id="formulario_agregar" action="{{ route('paquete.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="mb-3">
                    <label for="name" class="form-label">Nombre del paquete:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresa el nombre del paquete" required>
                  </div>

                  <div class="mb-3">
                    <label for="name" class="form-label">Estatus del paquete:</label>
                    <select class="custom-select" id="activo" name="activo">
                        <option selected>Selecciona el estatus del paquete</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                      </select>
                  </div>

                  <div class="mb-3">
                    <label for="price">Precio:</label>
                    <input type="number" class="form-control" id="precio" name="precio" placeholder="Ingresa el precio del paquete" step="1" min="0.00" required>
                </div>

                  <div class="mb-3">
                    <label for="email" class="form-label">Descripción:</label>
                    <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Ingresa una descripción" required>
                  </div>

                  <div class="mb-3">
                  <label for="imgs" class="form-label">Imagenes:</label>

                  <input type="file" name="images[]" multiple>

                    </div>

                       <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-dark btn-block" id="submit-all">Registrar Paquete</button>
                        <button type="button" class="btn btn-secondary btn-block mt-2" onclick="window.location.href='{{ route('paquete.index') }}'">Cancelar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>

  @endsection

