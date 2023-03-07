    <div class="container">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-6">
                <h2><b>@yield('tituloTabla')</b></h2>
              </div>
              <div class="col-sm-6">
                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"> <span>Add New Employee</span></a>
                <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"> <span>Delete</span></a>
              </div>
            </div>
          </div>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @yield('tablaContenido')
            </tbody>
          </table>
          <div class="clearfix">
            <div class="hint-text">Mostrando <b>5</b> de <b>15</b> registros</div>
            <ul class="pagination">
              <li class="page-item"><a href="#">Anterior</a></li>
              <li class="page-item active"><a href="#" class="page-link">1</a></li>
              <li class="page-item"><a href="#" class="page-link">2</a></li>
              <li class="page-item"><a href="#" class="page-link">3</a></li>
              <li class="page-item"><a href="#" class="page-link">Siguiente</a></li>
            </ul>
          </div>
        </div>
      </div>
      
      <!-- Edit Modal HTML -->
      <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <form>
              <div class="modal-header">
                <h4 class="modal-title">Añadir usuario</h4>
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
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                <input type="submit" class="btn btn-success" value="Añadir">
              </div>
            </form>
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
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                <input type="submit" class="btn btn-info" value="Guardar Cambios">
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
                <p class="text-warning"><small>Esta acción no se puede deshacer</small></p>
              </div>
              <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                <input type="submit" class="btn btn-danger" value="Eliminar">
              </div>
            </form>
          </div>
        </div>
      </div>

