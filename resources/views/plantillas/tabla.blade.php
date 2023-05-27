<div class="container divtabla">
    <div class="">
      <div>
        <div class="table">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-6">
                @yield('tituloTabla')
              </div>
              <div class="col-sm-6">
                @yield('btnTabla')
              </div>
            </div>
          </div>
          <table class="table table-striped" style="width:100%" id="tabla">
            <thead>
              <tr>
                @yield('columnas')
              </tr>
            </thead>
            <tbody>
              @yield('tablaContenido')
            </tbody>
          </table>
          @yield('lbl1')
        </div>
      </div>
    </div>
  </div>
