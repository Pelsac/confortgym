      <?php require_once RUTA_APP."/Views/plantilla/header.php";?>
<?php require_once RUTA_APP."/Views/plantilla/navbar.php";?>
<?php require_once RUTA_APP."/Views/plantilla/sidebar.php";?>
<div class="content-wrapper">
 <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">Editar producto</div>
                <div class="card-body">
                    <form action="<?php echo RUTA_URL?>productos/editar/<?php echo $datos['codigo'] ?>" method="POST"  enctype="multipart/form-data">
                    <div class="col-md-8"> 
                    <div class="form-group">
                    <label for="">Nombre</label>
                    <input name="nombre" type="text" value="<?php echo $datos['nombre'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Descripcion</label>
                    <input name="descripcion" type="text" value="<?php echo $datos['descripcion']?>"class="form-control">
                </div>
              
                <div class="form-group">
                        <label>Imagen</label>
                        <div class="custom-file">
                      <input type="file"  name="imagen"class="custom-file-input" id="customFile" accept="image/*">
                      <label class="custom-file-label" for="customFile" >Subir imagen</label>
                    </div>
                        </div>
                <div class="form-group">
               <a href="<?php echo RUTA_URL;?>productos/"class="btn btn-danger">Cancelar</a>
               
              <button type="submit" class="btn btn-primary">Aceptar</button>
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

<?php require_once RUTA_APP."/Views/plantilla/footer.php" ?>