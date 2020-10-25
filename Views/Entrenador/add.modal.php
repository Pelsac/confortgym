<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Nuevo Entrenador</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo RUTA_URL?>entrenadores/agregar" method="POST">
            <div class="modal-body">
            <form class="form-horizontal" name="imagenes"  enctype="multipart/formdata" >
            <div class="form-group">
                    <label for="">Identificacion</label>
                    <input name="identificacion" type="number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Nombres</label>
                    <input name="nombres" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Apellidos</label>
                    <input name="apellidos" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Celular</label>
                    <input name="celular" type="number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Fecha nacimiento</label>
                    <input name="fecha" type="date"  class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Direccion</label>
                    <input name="direccion" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Correo</label>
                    <input name="correo" type="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Imagen</label>
                    <input type="file" name="imagen" class="form-control">
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