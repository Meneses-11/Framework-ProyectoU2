<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('titulo')</title>
  <link rel="stylesheet" href="/css/styleBars.css">
  <link rel="stylesheet" href="/css/styleMenuClnt.css">
  <link rel="stylesheet" href="/css/stylePaquetes.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/css/styletabla.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <style>
        #drop-box {
          width: 150px;
          height: 200px;
          border: 2px dashed #ccc;
          border-radius: 10px;
          text-align: center;
          font-size: 20px;
          line-height: 300px;
          color: #ccc;
        }

        #drop-box.hover {
          border-color: #f00;
          color: #f00;
        }
      </style>
</head>
<header role="banner">
  @yield('titulobar')
</header>

  <nav  role='navigation'>
    <ul class="main">
        @yield('menu')
    </ul>
  </nav>


<body>
    <main role="main">
        <section class="panel important">
        <div>
            @yield('contenido')

        </div>
        </section>
<!-- Modal -->
<div class="modal fade" id="modalImg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Subir imagen</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Selecciona una imagen:</label>
                        <input type="file" class="form-control-file" id="imagen" accept="image/*">
                    </div>
                    <div class="mb-3">
                    <div id="drop-box" ondrop="handleDrop(event)" ondragover="handleDragOver(event)" ondragenter="handleDragEnter(event)" ondragleave="handleDragLeave(event)">Arrastra y suelta una imagen aquí</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Subir imagen</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
