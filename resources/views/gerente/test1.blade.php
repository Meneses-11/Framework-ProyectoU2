@extends('plantillas.menuGerente')

@section('titulo')
Paquetes test
@endsection
@section('titulobar')
Admin Gerente Paquetes:test
@endsection
@section('estilos')
<link rel="stylesheet" href="/css/styleTabla.css">
<style>
 /*   .contenedor-form-img {
  display: flex;
  padding: 20px 0px;

}

@media screen and (max-width: 910px) {
  .contenedor-agregar .contenedor-form-img {
    flex-direction: column;
  }

  .contenedor-agregar .img-media {
    width: 100%;
  }

  .contenedor-agregar .imagen-file {
    margin: 0px;
    padding-top: 20px;
  }
}

.contenedor-agregar .imagen-t {
  display: block;
  font-size: 16px;
  font-weight: bold;
  margin-top: 0px;
  margin-bottom: 15px;
}

.contenedor-agregar img {
  width: 500px;
  height: 500px;
}*/

.drop-zone {
            border: 2px dashed #ccc;
            width: 300px;
            height: 200px;
            padding: 20px;
            text-align: center;
            font-size: 18px;
            cursor: pointer;
        }
        .file-preview {
            display: inline-block;
            width: 80px;
            height: 80px;
            margin-right: 10px;
        }
        .file-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .file-preview .remove-btn {
            display: none;
            position: absolute;
            top: 0;
            right: 0;
            background: red;
            color: white;
            padding: 2px 5px;
            font-size: 12px;
            cursor: pointer;
        }
        .file-preview:hover .remove-btn {
            display: block;
        }
</style>
@endsection
@section('opcionesIzquierda')
<li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('usuario.inicio') }}">Administrar Usuarios</a></li>
<li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('paquete.index') }}">Administrar Paquetes</a></li>
<li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('servicio.inicio') }}">Administrar Servicios</a></li>
@endsection
@section('opcionesDerecha')
@endsection

@section('contenido')

@extends('plantillas.tabla')
@section('tituloTabla')
<h2 style="padding-left: 18px; font-size: 1rem !important; font-weight: bold;">Lista de Paquetes</h2>
@endsection
@section('btnTabla')
<a style="margin-right: 2%; text-align: center !important; color: black !important; background: #ffffff;" href="{{ route('paquete.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i><span>Añadir Nuevo Paquete</span></a>
@endsection
@section('columnas')
<th>Name</th>
<th>Position</th>
<th>Office</th>
<th>Age</th>
<th>Start date</th>
<th>Salary</th>
@endsection
@section('tablaContenido')


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
                    <div class="drop-zone" id="drop-zone">
                        Arrastra y suelta archivos aquí
                        <input type="file" id="file-input" multiple style="display: none;">
                        <div id="file-previews"></div>
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
@endsection


