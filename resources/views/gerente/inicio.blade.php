@extends('plantillas.menuGerente')

@section('titulo')
Usuarios
@endsection
@section('titulobar')
<div class="contentEmpresa">
    <img src="{{ asset('img/logo.png') }}" class="imgLogo">
    <h1 >Eleganza</h1>
    <div>Admin Gerente</div>
</div>
@endsection
@section('menu')
    <li class="dashboard"><a href="{{ route('listaUsuarios') }}">Administrar Usuarios</a></li>
    <li class="dashboard"><a href="{{ route('listaPaquetes') }}">Lista de Paquetes</a></li>
    <li class="dashboard"><a href="{{ route('listaServicios') }}">Lista de servicios</a></li>
@endsection

@section('contenido')
@extends('plantillas.tabla')
@section('tituloTabla1')
<h2>Lista de Clientes</h2>
@endsection
@section('columnast1')
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Telefono</th>
@endsection
@section('tablaContenidot1')
@php
    $clientest1 = $clientes->where('rol','Cliente');
@endphp
@foreach ($clientest1 as $cliente)
<tr>
    <td>
        <span class="custom-checkbox">
            <input type="checkbox" id="checkbox1" name="options[]" value="1">
            <label for="checkbox1"></label>
        </span>
    </td>
    <td>{{ $cliente->id_usuario}}</td>
    <td>{{ $cliente->nombre }}</td>
    <td>{{ $cliente->apellido}}</td>
    <td>{{ $cliente->email }}</td>
    <td>{{ $cliente->telefono}}</td>
    <td>
        <div class="d-inline-flex p-n2 align-items-center">
            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="fas fa-pen" data-toggle="tooltip" title="Editar"></i></a>
            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar"></i></a>
        </div>
    </td>
</tr>

@endforeach

@endsection
@section('lbl1')
<div class="clearfix elemento">
    <div class="hint-text">Mostrando <b>{{ $clientes->where('rol','Cliente')->count() }}</b> registros</div>
</div>
@endsection

@section('tituloTabla2')
<h2>Lista de Empleados</h2>
@endsection
@section('columnast2')
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Nombre de usuario</th>
        <th>Fecha de nacimiento</th>
        <th>Direccion</th>
        <th>Correo</th>
        <th>Telefono</th>
@endsection
@section('tablaContenidot2')
@php
    $clientest2 = $clientes->where('rol','Empleado');
@endphp
@foreach ($clientest2 as $cliente)
<tr>
    <td>
        <span class="custom-checkbox">
            <input type="checkbox" id="checkbox1" name="options[]" value="1">
            <label for="checkbox1"></label>
        </span>
    </td>
    <td>{{ $cliente->id_usuario}}</td>
    <td>{{ $cliente->nombre }}</td>
    <td>{{ $cliente->apellido}}</td>
    <td>{{ $cliente->nombre_usuario}}</td>
    <td>{{ $cliente->fecha_nacimiento }}</td>
    <td>{{ $cliente->direccion }}</td>
    <td>{{ $cliente->email }}</td>
    <td>{{ $cliente->telefono}}</td>
    <td>
        <div class="d-inline-flex p-n2 align-items-center">
            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="fas fa-pen" data-toggle="tooltip" title="Editar"></i></a>
            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar"></i></a>
        </div>
    </td>
</tr>

@endforeach

@endsection


@section('lbl2')
<div class="clearfix elemento">
    <div class="hint-text">Mostrando <b>{{ $clientes->where('rol','Empleado')->count() }}</b> registros</div>
</div>

@endsection
@section('tituloTabla3')
<h2>Lista de Gerentes</h2>
@endsection
@section('columnast3')
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Telefono</th>
@endsection
@section('tablaContenidot3')
@php
    $clientest2 = $clientes->where('rol','Gerente');
@endphp
@foreach ($clientest2 as $cliente)
<tr>
    <td>
        <span class="custom-checkbox">
            <input type="checkbox" id="checkbox1" name="options[]" value="1">
            <label for="checkbox1"></label>
        </span>
    </td>
    <td>{{ $cliente->id_usuario}}</td>
    <td>{{ $cliente->nombre }}</td>
    <td>{{ $cliente->apellido}}</td>
    <td>{{ $cliente->email }}</td>
    <td>{{ $cliente->telefono}}</td>
    <td>
        <div class="d-inline-flex p-n2 align-items-center">
            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="fas fa-pen" data-toggle="tooltip" title="Editar"></i></a>
            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar"></i></a>
        </div>
    </td>
</tr>

@endforeach

@endsection


@section('lbl2')
<div class="clearfix elemento">
    <div class="hint-text">Mostrando <b>{{ $clientes->where('rol','Gerente')->count() }}</b> registros</div>
</div>

@endsection
@endsection



<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
        <div class="modal-header">
            <h6 class="modal-title">Añadir usuario</h6>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
            <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="form-group">
            <label>Apellido</label>
            <input type="text" class="form-control" name="apellido" required>
            </div>
            <div class="form-group">
            <label>Nombre de usuario</label>
            <input type="text" class="form-control" name="nusuario" required>
            </div>
            <div class="form-group">
            <label>Contraseña</label>
            <input type="text" class="form-control" name="pass" required>
            </div>
            <div class="form-group">
            <div class="input-group-prepend">
                    <label class="" for="inputGroupSelect01">Options</label>
                  </div>
                  <select class="custom-select" id="inputGroupSelect01" name="seleccion">
                    <option selected>Selecciona una opción...</option>
                    <option value="Gerente">Gerente</option>
                    <option value="Empleado">Empleado</option>
                    <option value="Cliente">Cliente</option>
                  </select>
            </div>
            <div class="form-group">
            <label>Fecha de nacimiento</label>
            <input type="date" class="form-control" name="fecha" required>
            </div>
            <div class="form-group">
            <label>Direccion</label>
            <input type="text" class="form-control" name="direccion" required>
            </div>
            <div class="form-group">
            <label>Correo</label>
            <input type="email" class="form-control" name="correo" required>
            </div>
            <div class="form-group">
            <label>Telefono</label>
            <input type="tel" class="form-control" name="telefono" required>
            </div>
        </div>
        <div class="modal-footer">
            <input type="cancel" class="btn btn-default" data-dismiss="modal" value="Cancelar" style="width: 170px;padding: 11.5px;margin-right: 20px;">
            <input type="submit" class="btn btn-success" value="Añadir" style="margin: 5px">
        </div>
        </form>
    </div>
    </div>
</div>
</div>

<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
        <form>
        <div class="modal-header">
            <h4 class="modal-title">Editar usuario</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
            <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" required>
            </div>
            <div class="form-group">
            <label>Correo</label>
            <input type="email" class="form-control" required>
            </div>
            <div class="form-group">
            <label>Telefono</label>
            <input type="text" class="form-control" required>
            </div>
        </div>
        <div class="modal-footer">
            <input type="cancel" class="btn btn-danger" data-dismiss="modal" value="Cancelar" style="width: 170px;padding: 11.5px; margin-right: 15px;">
            <input type="submit" class="btn btn-danger" value="Guardar" style="margin-right: 5px">
        </div>
        </form>
    </div>
    </div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
        <form>
        <div class="modal-header">
            <h4 class="modal-title">Eliminar Usuario</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
            <p>¿Estas seguro que quieres eliminar este usuario?</p>
            <p class="" style="font-size: 20px; color: #ffc107 !important;"><small>Esta acción no se puede deshacer</small></p>
        </div>
        <div class="modal-footer" style="flex-wrap: unset !important;">
            <input type="cancel" class="btn btn-danger" data-dismiss="modal" value="Cancelar" style="width: 170px;padding: 11.5px;margin-right: 20px;">
            <input type="submit" class="btn btn-danger" value="Eliminar" style="margin: 0px">
        </div>
        </form>
    </div>
    </div>
</div>



