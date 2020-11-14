<?php require_once RUTA_APP."/views/plantilla/header.php";?>
<?php require_once RUTA_APP."/views/plantilla/navbar.php";?>
<?php require_once RUTA_APP."/views/plantilla/sidebar.php";?>
<div class="content-wrapper">
 <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">Editar usuario</div>
                <div class="card-body">
                    <form action="<?php echo RUTA_URL?>usuarios/editar/<?php echo $datos['id'] ?>" method="POST">
                    <div class="form-group">
                              <label for="">Id </label>
                              <input name="id" type="text"  value="<?php echo $datos['id']?>"  disabled="disabled" class="form-control" required>
                          </div>
                          <div class="form-group">
                              <label for="">Alias</label>
                              <input name='alias' type="text"  value="<?php echo $datos['alias']?>" class="form-control" required>
                          </div>
                          <div class="form-group">
                              <label for="">Email</label>
                              <input name='correo' type="email" value="<?php echo $datos['correo']?>"  class="form-control" required>
                          </div>
                          <div class="form-group">
                              <label for="">Id_rol</label>
                              <input name='id_rol' type="int" value="<?php echo $datos['id_rol']?>"  class="form-control" required>
                          </div>
                    <div class="form-group">
                    <a href="<?php echo RUTA_URL;?>usuarios/" class="btn btn-danger">Cancelar</a>
               
               <button type="submit" class="btn btn-primary">Guardar</button>
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




 