@extends('plantillas.menuGerente')

@section('titulo')
Servicios
@endsection
@section('titulobar')
<div class="contentEmpresa">
    <img src="{{ asset('img/logo.png') }}" class="imgLogo">
     Servicios
</div>
@endsection
@section('contenido')
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
                <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="IEscribe una descripción del servicio" required>
              </div>

              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-block">Registrar servicio</button>
                <button type="button" class="btn btn-danger btn-block mt-2" onclick="window.location.href='{{ route('servicio.inicio') }}'">Cancelar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection

