@extends('plantillas.menuGerente')
@section('titulo')
Salón Eventos
@endsection
@section('estilos')
<link rel="stylesheet" href="/css/styleAnonimo.css">
@endsection

@section('titulobar')
Salón de Eventos  {{ Auth::user()->nombre }}
@endsection
@section('opcionesIzquierda')

<li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('empleado.index') }}">Eventos</a></li>

@endsection

@section('opcionesDerecha')
<li><a class="dropdown-item" href="{{ route('cerrar_sesion') }}">Cerrar Sesión</a></li>
@endsection

@section('contenido')

<div class="card text-center" style="margin: 8% 8% 8% 8%;">
    <div class="card-header d-flex justify-content-between">
        <h2>Imagenes del evento</h2>
        <a href="#" data-toggle="modal" data-target="#addModal{{ $evento->id_evento }}" data-tooltip="Agregar Imagenes" title="Agregar imagenes" class="btn btn-dark">Agregar Imagen</a>
    </div>

    <div class="row">
        @foreach ($evento->imagenes as $i)
        <div class="col-lg-4" style="padding: 3%">
            <div class="card h-100">
                <img src="{{ $i->ruta }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Nombre de la imagen: {{ $i->nombre }}</h5>
                    <p class="card-text">Descripción de la imagen: {{ $i->descripcion }}</p>
                    <a href="#" data-toggle="modal" data-target="#editModal{{$i->id }}" data-tooltip="Editar" title="Editar" class="btn btn-sm btn-success">Editar descripción</a>
                    <a href="#" data-toggle="modal" data-target="#deleteModal{{$i->id }}" data-tooltip="Eliminar" title="Eliminar" class="btn btn-sm btn-danger">Eliminar imagen</a>
                </div>
            </div>
        </div>

    {{-- Modal para editar campo descripción --}}
    <div class="modal fade" id="editModal{{ $i->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $i->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $i->id }}">Editar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('evento.editDescripcion',$i->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <label for="descripcion">Nueva descripción:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-dark">Modificar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal para eliminar una imagen --}}
    <div class="modal fade" id="deleteModal{{ $i->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $i->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $i->id }}">Eliminar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="eliminar-alert" method="post" action="{{ route('imagen.destroy', $i->id) }}">
                        @csrf
                        @method('DELETE')
                        <label for="descripcion">Esta seguro que quiere eliminar la imagen: {{ $i->nombre }}</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar Imagen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endforeach

    </div>
    {{-- Modal para agregar imagenes --}}
    <div class="modal fade" id="addModal{{ $evento->id_evento }}" tabindex="-1" role="dialog" aria-labelledby="addModalLabel{{ $evento->id_evento }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel{{ $evento->id_evento }}">Agregar Imagenes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('evento.imagenes', $evento->id_evento)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="descripcion">Nueva descripción:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="imgs" class="form-label">Imagenes:</label>
                                <input class="form-control" type="file" name="images[]" id="archivoPaquete" accept="image/*" multiple>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-dark">Guardar Imagen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    @if (session('eliminado') == 'si')
    <script>
            alert('Se elimino correctamente la imagen');
    </script>
    {{ Session::forget('eliminado') }}
    @endif
@endsection

