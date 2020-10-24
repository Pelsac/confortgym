<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Nueva Rutina</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo RUTA_URL?>rutinas/agregar" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nombre de rutina</label>
                    <input name="nombre_rutina" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Descripcion</label>
                    <textarea name="descripcion" type="text" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="">tipo de rutina</label>
                    <input name="tipo-rutina" type="text" class="form-control">
                </div>
                <div class="form-group">
                <label>Nivel de la rutina</label>
                        <select name="nivel_rutina" class="form-control">
                        <?php foreach($datos['niveles'] as $nivel): ?>
                          <option value="<?php echo $nivel->id ?>"><?php echo $nivel->tipo_nivel ?></option>
                        
                        <?php endforeach ?>
                        </select>
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