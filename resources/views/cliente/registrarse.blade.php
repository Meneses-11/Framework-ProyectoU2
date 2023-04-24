@extends('plantillas.menuGerente')

@section('tiello')
Usuarios
@endsection

@section('tiellobar')
Admin Gerente Usuarios
@endsection
@section('estilos')
<link rel="stylesheet" href="/css/styleTabla.css">
@endsection

@section('opcionesIzquierda')
<li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('usuario.inicio') }}">Administrar Usuarios</a></li>
<li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('paquete.index') }}">Administrar Paquetes</a></li>
<li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('servicio.inicio') }}">Administrar Servicios</a></li>
@endsection
@section('opcionesDerecha')

<li><a class="dropdown-item" href="{{ route('inicio') }}">Inicio</a></li>
<li><a class="dropdown-item" href="{{ route('login') }}">Iniciar Sesión</a></li>
@endsection

@section('contenido')
<div class="centrar" style="margin-top: 7rem">

</div>
  <div class="container">
    <div class="row justify-content-center align-items-center vh-100">
      <div class="col-lg-6 col-md-8 col-sm-10">
        <div class="card p-4">
          <div class="card-header">
            <h1 class="text-center">Registro</h1>
          </div>
          <div class="card-body">
            <form action="{{ route('usuario.llenar') }}" method="POST">
                @csrf
              <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresa el nombre" required>
              </div>

              <div class="mb-3">
                <label for="name" class="form-label">Apellidos:</label>
                <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Ingresa los apellidos" required>
              </div>

              <div class="mb-3">
                <label for="name" class="form-label">Nombre de usuario:</label>
                <input type="text" id="nombre_usuario" name="nusuario" class="form-control" placeholder="Ingresa el nombre de usuario" required>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico:</label>
                <input type="email" id="email" name="correo" class="form-control" placeholder="Ingresa el correo electrónico" required>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Fecha de nacimiento:</label>
                <input type="date" id="fecha" name="fecha" class="form-control" placeholder="Ingresa o selecciona el fecha de nacimiento" required>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" id="password" name="p1" class="form-control" placeholder="Ingresa la contraseña" required>
              </div>
                @if($errors->has('password_nueva'))
                <span class="text-danger">{{ $errors->first('password_nueva') }}</span>
                @endif
              <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirmar Contraseña:</label>
                <input type="password" id="confirm_password" name="p2" class="form-control" placeholder="Confirma el contraseña" required>
              </div>
                @if($errors->has('password_nueva'))
                <span class="text-danger">{{ $errors->first('password_nueva') }}</span>
                @endif
              <div class="mb-3">
                <label for="email" class="form-label">Telefono:</label>
                <input type="tel" id="numero" name="telefono" class="form-control" placeholder="Ingresa el numero telefonico" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Dirección:</label>
                <input type="tel" id="numero" name="direccion" class="form-control" placeholder="Ingresa el direccón" required>
              </div>
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-dark btn-block">Registrar Usuario</button>
                <button type="button" class="btn btn-secondary btn-block mt-2" onclick="window.location.href='{{ route('usuario.inicio') }}'">Cancelar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection
