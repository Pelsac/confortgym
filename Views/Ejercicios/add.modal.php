<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Nuevo ejercicio</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo RUTA_URL?>ejercicios/agregar" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text"  name="nombre"class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                                <label for="">duracion</label>
                                <input type="text" name="duracion" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                                <label for="">Descripcion:</label>
                                <textarea  name="descripcion" class="form-control form-control-sm"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                            <label for="">Repeticiones</label>
                            <input type="number" name="repeticiones" class="form-control form-control-sm">
                            </div>
                    <div class="form-group">
                    <label for="">Avatar</label>
                    <div class="custom-file">
                      <input type="file"  name="avatar"class="custom-file-input" id="customFile" accept="image/*">
                      <label class="custom-file-label" for="customFile" >Subir imagen</label>
                    </div>
                  </div>
                  <div class="form-group">
                        <label>Tipo de ejercicio</label>
                                <select name="tipo" class="form-control">
                                <?php foreach($datos['categorias'] as $cat): ?>
                                <option value="<?php echo $cat->id?>"><?php echo $cat->categoria?></option>
                                    
                                <?php endforeach ?>
                                </select>
                        </div>
                    </div>               
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
            </div>
           
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>