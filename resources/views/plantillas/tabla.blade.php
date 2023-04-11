    <div class="container divtabla">
        <div >
        <div>

            <div class="table">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            @yield('tituloTabla1')
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('usuario.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i><span>Añadir Nuevo Usuario</span></a>
                            <a href="#eliminarModal" class="btn btn-danger" data-toggle="modal"><i class="fas fa-minus-circle"></i><span>Eliminar Seleccionados</span></a>
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
                    @yield('columnast1')
                </tr>
                </thead>
                <tbody>
                @yield('tablaContenidot1')
                </tbody>
            </table>
            @yield('lbl1')

        </div>
        <br>
        <br>
        <div class="table">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        @yield('tituloTabla2')
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('usuario.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i><span>Añadir Nuevo</span></a>
                        <a href="#eliminarModal" class="btn btn-danger" data-toggle="modal"><i class="fas fa-minus-circle"></i><span>Eliminar Seleccionados</span></a>
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
                @yield('columnast2')
            </tr>
            </thead>
            <tbody>
            @yield('tablaContenidot2')
            </tbody>
        </table>
        @yield('lbl2')

    </div>
<br>
<br>
    <div class="table">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    @yield('tituloTabla3')
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('usuario.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i><span>Añadir Nuevo</span></a>
                    <a href="#eliminarModal" class="btn btn-danger" data-toggle="modal"><i class="fas fa-minus-circle"></i><span>Eliminar Seleccionados</span></a>
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
            @yield('columnast3')
        </tr>
        </thead>
        <tbody>
        @yield('tablaContenidot3')
        </tbody>
    </table>
    @yield('lbl3')

</div>
      </div>
    </div>
    @if (Route::currentRouteName()=='listaPaquetes')
        <!-- Add Modal HTML -->
        <div id="addEmployeeModal" class="modal fade">
            <div class="modal-dialog">
            <div class="modal-content">
                <form>
                <div class="modal-header">
                    <h4 class="modal-title">Añadir Paquete</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                    <label>Nombre del Paquete</label>
                    <input type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label>Descripción</label>
                    <input type="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label>Precio</label>
                    <input type="text" class="form-control" required>
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
                    <h4 class="modal-title">Editar Paquete</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                    <label>Nombre del Paquete</label>
                    <input type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label>Descripción</label>
                    <input type="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label>Precio</label>
                    <input type="text" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="cancel" class="btn btn-default" data-dismiss="modal" value="Cancelar" style="width: 170px;padding: 11.5px; margin-right: 15px;">
                    <input type="submit" class="btn btn-success" value="Guardar" style="margin: 5px">
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
                    <h4 class="modal-title">Eliminar Paquete</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>¿Estas seguro que quieres eliminar este Paquete?</p>
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


    @endif
    @if (Route::currentRouteName()=='listaServicios')
              <!-- Add Modal HTML -->
              <div id="addEmployeeModal" class="modal fade">
                <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Añadir Servicio</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                        <label>Nombre del servicio</label>
                        <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label>Descripción</label>
                        <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label>Precio</label>
                        <input type="text" class="form-control" required>
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
                        <h4 class="modal-title">Editar Servicio</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                        <label>Nombre del servicio</label>
                        <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label>Descripción</label>
                        <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label>Precio</label>
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
                        <h4 class="modal-title">Eliminar Servicio</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estas seguro que quieres eliminar este servicio?</p>
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
    @endif

