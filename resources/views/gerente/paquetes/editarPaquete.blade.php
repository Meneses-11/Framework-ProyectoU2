@extends('plantillas.menuGerente')

@section('titulo')
Paquetes
@endsection
@section('titulobar')
<div class="contentEmpresa">
    <img src="{{ asset('img/logo.png') }}" class="imgLogo">
     Paquetes
</div>
@endsection
@section('contenido')
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h1 class="text-center">Agregar Paquetes</h1>
          </div>
          <div class="card-body">
            <form action="{{ route('paquete.actualizar',$paquete->id_paquete) }}" method="POST">
                @csrf
                @method('PUT')
              <div class="mb-3">
                <label for="name" class="form-label">Nombre del paquete:</label>
                <input type="text" value="{{ $paquete->nombre }}" id="nombre" name="nombre" class="form-control" required>
              </div>

              <div class="mb-3">
                <label for="name" class="form-label">Estatus del paquete:</label>
                <select class="custom-select" id="activo" name="activo">
                    <option selected>Selecciona una opción...</option>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                  </select>
              </div>

              <div class="mb-3">
                <label for="price">Precio:</label>
                <input type="number" value="{{ $paquete->precio }}" class="form-control" id="precio" name="precio" step="0.01" min="0.00">
            </div>

              <div class="mb-3">
                <label for="email" class="form-label">Descripción:</label>
                <input type="text" value="{{ $paquete->descripcion }}" id="descripcion" name="descripcion" class="form-control" placeholder="Ingresa o selecciona tu fecha de nacimiento" required>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Direccion de la foto:</label>
                <input type="tel" id="direccion" value="{{ $paquete->nombre_foto }}" name="direccion" class="form-control" placeholder="Ingresa tu direccón" required>
              </div>
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-block">Actualizar Paquete</button>
                <button type="button" class="btn btn-danger btn-block mt-2" onclick="window.location.href='{{ route('paquete.index') }}'">Cancelar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection

