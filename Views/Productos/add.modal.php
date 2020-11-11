<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Nuevo producto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo RUTA_URL?>productos/agregar" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                               <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="nombre" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                                <label for="">Descripcion</label>
                                <textarea  name="descripcion" class="form-control form-control-sm"></textarea>
                        </div>
                      
                
                  <div class="form-group">
                        <label>Imagen</label>
                        <div class="custom-file">
                      <input type="file"  name="imagen"class="custom-file-input" id="customFile" accept="image/*">
                      <label class="custom-file-label" for="customFile" >Subir imagen</label>
                    </div>
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