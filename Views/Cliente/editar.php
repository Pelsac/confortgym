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
                    <form action="<?php echo RUTA_URL?>clientes/editar/<?php echo $datos['id'] ?>" method="POST">
                    <div class="form-group">
                    <label for="">Nombres</label>
                    <input name="nombres" type="text" value="<?php echo $datos['nombres'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Apellidos</label>
                    <input name="apellidos" type="text" value="<?php echo $datos['apellidos']?>"class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Fecha nacimiento</label>
                    <input name="fecha" type="date" value="<?php echo $datos['fecha'] ?>" class="form-control">
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
                    <input type="text" value="<?php echo $datos['cod'] ?>" name="codigo" class="form-control">
                </div>
                <div class="form-group">
                <a href="<?php echo RUTA_URL;?>clientes/"class="btn btn-danger">Cancelar</a>
              <button type="submit" class="btn btn-primary">Aceptar</button>
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
