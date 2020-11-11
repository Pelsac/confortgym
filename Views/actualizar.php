
<?php require_once RUTA_APP."/views/inc/header.php";?>
<?php require_once RUTA_APP."/views/inc/navbar.php";?>
<div class="container mt-5 p-5">
    <div class="row">
            <div class="col-md-12 col-gl-12">
            <input type="hidden" id="id_user" value= "<?php echo $_SESSION['identificacion'] ?>">
                 <h3>Actualiza los datos de tu perfil</h3>
            </div>
            <div class="col-md-12">

            <a href="">Datos personales</a>
            <a href="">Datos de usuario</a>
            <div class="card">
                
                 <form action="">
                        <div class="card-body">
                          <div class="form-group">
                              <label for="">Nombres</label>
                              <input type="text" class="form-control" required>
                          </div>
                          <div class="form-group">
                              <label for="">Apellidos</label>
                              <input type="text" class="form-control" required>
                          </div>
                          <div class="form-group">
                              <label for="">email</label>
                              <input type="text" class="form-control" required>
                          </div>
                      </div>
                 </form>  
                      
                 </div>
                
             </div>
             </div>
    </div>
</div>
<?php require_once RUTA_APP."/views/inc/footer.php" ?>
<script src="<?php echo RUTA_URL ?>/assets/alertifyjs/alertify.min.js"></script>
<script src="<?php echo RUTA_URL ?>/assets/js/index.js"></script>