    <div class="container divtabla">
        <div class="" >
        <div>
            <div class="table">
                <div class="table-title" >
                    <div class="row">
                        <div class="col-sm-6" >
                            @yield('tituloTabla')
                        </div>
                        <div class="col-sm-6">
                            @yield('btnTabla')
                            </div>
                    </div>
                </div>

            <table class="table table-striped table-hover" id="tabla_users">
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
    <script>
        $(document).ready(function () {
        $('#tabla_users').DataTable();
        });
    </script>




