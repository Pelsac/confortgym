<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Nueva Rutina</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo RUTA_URL?>rutinas/agregar" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="row">
              <div class="col-md-6">
               <div class="form-group">
                    <label for="">Nombre de rutina</label>
                    <input name="nombre" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Descripcion general</label>
                    <textarea name="descripcion" type="text" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="">Descripcion corta</label>
                    <textarea name="descripcion_corta" type="text" class="form-control" required></textarea>
                </div>
               
               </div>
               
               <div class="col-md-6">
               <div class="form-group">
                  <label>Asignar ejercicios</label>
                  <div class="select2-purple">
                  <select name="ejercicios[]" class="select2"  data-dropdown-css-class="select2-purple" multiple="multiple" data-placeholder="agregar ejercicio" required style="width: 100%;">
                  <?php foreach($datos['ejercicios'] as $ejer): ?>
                    <option value="<?php echo $ejer->id_ejer ?>"><?php echo $ejer->nombre ?></option>
                   
                    <?php endforeach ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="">banner</label>
                    <div class="custom-file">
                      <input type="file"  name="banner"class="custom-file-input" id="customFile" accept="image/*" required>
                      <label class="custom-file-label" for="customFile" >Subir imagen</label>
                    </div>
                  </div>
                  <div class="form-group">
                <label>Nivel de la rutina</label>
                        <select name="nivel" class="form-control" requied>
                        <?php foreach($datos['niveles'] as $nivel): ?>
                          <option value="<?php echo $nivel->id ?>"><?php echo $nivel->tipo_nivel ?></option>
                        
                        <?php endforeach ?>
                        </select>
                </div>
          
                </div>
                <div class="form-group">
                    <label for="">Frase Motivacional</label>
                    <input type="text" name="frase" class="form-control">
                </div>
               </div>
               
               </div>
              </div>
               
          
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
            </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>