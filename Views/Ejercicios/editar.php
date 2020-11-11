
<?php require_once RUTA_APP."/views/plantilla/header.php";?>
<?php require_once RUTA_APP."/views/plantilla/navbar.php";?>
<?php require_once RUTA_APP."/views/plantilla/sidebar.php";?>
<div class="content-wrapper">
<?php require_once RUTA_APP."/views/plantilla/content-header.php";?>
 <section class="content">
      <div class="container-fluid">
      <form action="<?php echo RUTA_URL?>ejercicios/editar/<?php echo $datos['id']?>" method="POST" enctype="multipart/form-data">
            
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" value="<?php echo $datos['nombre'] ?>"  name="nombre"class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                                <label for="">duracion</label>
                                <input type="text" value="<?php echo $datos['duracion'] ?>"name="duracion" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                                <label for="">Descripcion:</label>
                                <textarea  name="descripcion"  class="form-control form-control-sm"><?php echo $datos['descripcion'] ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                            <label for="">Repeticiones</label>
                            <input type="number" value="<?php echo $datos['repeticiones'] ?>" name="repeticiones" class="form-control form-control-sm">
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
        
           
            </form>
    </div>
</section>





      <?php require_once RUTA_APP."/views/plantilla/footer.php" ?>