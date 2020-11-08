<?php require_once RUTA_APP."/Views/plantilla/header.php";?>
<?php require_once RUTA_APP."/Views/plantilla/navbar.php";?>
<?php require_once RUTA_APP."/Views/plantilla/sidebar.php";?>


<div class="content-wrapper">
<?php require_once RUTA_APP."/Views/plantilla/content-header.php";?>
 <section class="content">
      <div class="container-fluid">
        <form action="">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="">Nueva contraseña</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Confirmar contraseña</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-success">aceptar</button>
                    </div>
                </div>
            </div>
        </form>
      </div>

 </section>
</div>   
 <?php require_once RUTA_APP."/Views/plantilla/footer.php" ?>