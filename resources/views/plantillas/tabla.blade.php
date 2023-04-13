    <div class="container divtabla">
        <div >
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

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>
                        <span class="custom-checkbox ">
                            <input type="checkbox" id="selectAll">
                            <label for="selectAll"></label>
                        </span>
                    </th>
                    @yield('columnas')
                </tr>
                </thead>
                <tbody>
                @yield('tablaContenido')
                </tbody>
            </table>
            @yield('lbl')
        </div>
      </div>
    </div>



