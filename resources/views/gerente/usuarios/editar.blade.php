@extends('plantillas.menuGerente')

@section('titulo')
Usuarios
@endsection

@section('titulobar')
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
<li><a class="dropdown-item" href="{{ route('cerrar_sesion') }}">Cerrar Sesión</a></li>
@endsection
@section('contenido')
<div class="centrar" style="margin-top: 7rem">
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
          <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="card p-4">
              <div class="card-header">
                <h1 class="text-center">Registro de Usuarios</h1>
              </div>
              <div class="card-body">
                <form action="{{ route('usuario.actualizar',$alguien->id_usuario) }}" method="POST">
                    @csrf
                    @method('PUT')
                  <div class="mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input value="{{ $alguien->nombre }}" type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresa tu nombre" required>
                  </div>

                  <div class="mb-3">
                    <label for="name" class="form-label">Apellido:</label>
                    <input value="{{ $alguien->apellido }}" type="text" id="apellido" name="apellido" class="form-control" placeholder="Ingresa tu nombre" required>
                  </div>

                  <div class="mb-3">
                    <label for="name" class="form-label">Nombre de usuario:</label>
                    <input value="{{ $alguien->nombre_usuario }}" type="text" id="nombre_usuario" name="nusuario" class="form-control" placeholder="Ingresa tu nombre" required>
                  </div>

                  <div class="mb-3">
                        <label for="name" class="form-label">Rol:</label>
                        <select class="custom-select" id="inputGroupSelect01" name="seleccion">
                        <option selected>Selecciona una opción...</option>
                        <option value="Gerente">Gerente</option>
                        <option value="Empleado">Empleado</option>
                        <option value="Cliente">Cliente</option>
                      </select>
                  </div>

                  <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico:</label>
                    <input value="{{ $alguien->email }}" type="email" id="email" name="correo" class="form-control" placeholder="Ingresa tu correo electrónico" required>
                  </div>

                  <div class="mb-3">
                    <label for="email" class="form-label">Fecha de nacimiento:</label>
                    <input value="{{ $alguien->fecha_nacimiento }}" type="date" id="fecha" name="fecha" class="form-control" placeholder="Ingresa o selecciona tu fecha de nacimiento" required>
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Contraseña Anterior:</label>
                    <input type="password" id="password" name="pa" class="form-control" placeholder="Ingresa la contraseña anterior" required>
                  </div>
                    @if($errors->has('password_actual'))
                    <span class="text-danger">{{ $errors->first('password_actual') }}</span>
                    @endif
                  <div class="mb-3">
                    <label for="password" class="form-label">Nueva Contraseña:</label>
                    <input  type="password" id="password" name="p1" class="form-control" placeholder="Ingresa la nueva contraseña" required>
                  </div>
                    @if($errors->has('password_nueva'))
                    <span class="text-danger">{{ $errors->first('password_nueva') }}</span>
                    @endif
                  <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirma tu Nueva Contraseña:</label>
                    <input type="password" id="confirm_password" name="p2" class="form-control" placeholder="Confirma la nueva contraseña" required>
                  </div>

                  <div class="mb-3">
                    <label for="email" class="form-label">Telefono:</label>
                    <input value="{{ $alguien->telefono }}" type="tel" id="numero" name="telefono" class="form-control" placeholder="Ingresa tu numero telefonico" required>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Dirección:</label>
                    <input value="{{ $alguien->direccion }}" type="tel" id="numero" name="direccion" class="form-control" placeholder="Ingresa tu direccón" required>
                  </div>
                  <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-dark btn-block">Actualizar Usuario</button>
                    <button type="button" class="btn btn-secondary btn-block mt-2" onclick="window.location.href='{{ route('usuario.inicio') }}'">Cancelar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>


  @endsection

