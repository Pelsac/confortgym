<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Nuevo cliente</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo RUTA_URL?>clientes/agregar" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nombres</label>
                    <input name="nombres" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Apellidos</label>
                    <input name="apellidos" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Fecha nacimiento</label>
                    <input name="fecha" type="date" class="form-control">
                </div>
                <div class="form-group">
                <label>genero</label>
                        <select name="genero" class="form-control">
                          <option value="masculino">Masculino</option>
                          <option value="femenino">Femenino</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="">Codigo de ingreso</label>
                    <input type="text" name="codigo" class="form-control">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>