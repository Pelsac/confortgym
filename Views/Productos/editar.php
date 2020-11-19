<?php require_once RUTA_APP."/views/plantilla/header.php";?>
<?php require_once RUTA_APP."/views/plantilla/navbar.php";?>
<?php require_once RUTA_APP."/views/plantilla/sidebar.php";?>
<div class="content-wrapper">
 <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">Editar producto</div>
                <div class="card-body">
                    <form action="<?php echo RUTA_URL?>productos/editar/<?php echo $datos['codigo'] ?>" method="POST"  enctype="multipart/form-data">
                                <div class="row">
                                
                               
                             <div class="col-md-6"> 
                             <div class="form-group">
                        <label for="">Nombre</label>
                        <input name="nombre" type="text" value="<?php echo $datos['nombre'] ?>" class="form-control" required>
                    </div>
                        <div class="form-group">
                                <label for="">stock</label>
                                <input type="number" min="1" value="<?php echo $datos['stock'] ?>"name="stock" class="form-control form-control-sm" required>
                        </div>
                    <div class="form-group">
                        <label for="">Descripcion</label>
                        <input name="descripcion" type="text" value="<?php echo $datos['descripcion']?>"class="form-control" required>
                    </div>
                    
                      
                            </div>
                          
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Precio</label>
                                <input type="number" min="1" value="<?php echo $datos['precio'] ?>"name="precio" class="form-control form-control-sm" required>
                    </div>
                            <div class="form-group">
                                <label for="">cantidad</label>
                                <input type="number" min="1" name="cantidad" value="<?php echo $datos['cantidad'] ?>" class="form-control form-control-sm">
                        </div>
                    <div class="form-group">
                        <label>Imagen</label>
                        <div class="custom-file">
                            <input type="file"  name="imagen" class="custom-file-input" id="customFile" required accept="image/*" required>
                             <label class="custom-file-label" for="customFile" >Subir imagen</label>
                            </div>
                        </div>
                        <div class="form-group">
                         <a href="<?php echo RUTA_URL;?>productos/"class="btn btn-danger">Cancelar</a>
                    
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                        </div>
                            </div>
                            </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
     </div>
  </section>
</div>

<?php require_once RUTA_APP."/views/plantilla/footer.php" ?>