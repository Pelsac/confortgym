
<?php require_once RUTA_APP."/views/inc/header.php";?>
<?php require_once RUTA_APP."/views/inc/navbar.php";?>
<div class="container mt-5 p-5">
    <div class="row">
            <div class="col-md-12 col-gl-12">
            <input type="hidden" id="id_user" value= "<?php echo $_SESSION['identificacion'] ?>">
                 <h3>Actualiza los datos de tu perfi:</h3>
                                  <h4>¡Datos personales!</h4>
            </div>
            <div class="col-md-12">

            <div class="form-group">
                    <a href="<?php echo RUTA_URL;?>home/actualizardatos"class="btn btn-primary">Datos personales</a>
          <a href="<?php echo RUTA_URL;?>home/actualizardatosU"class="btn btn-primary">Datos de usuario</a>
         
        </div>
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
                    <label for="">Fecha de nacimiento</label>
                    <input name="fecha" type="date" class="form-control">
                </div>
                <div class="form-group">
                <label>Genero</label>
                        <select name="genero" class="form-control">
                          <option value="masculino">Masculino</option>
                          <option value="femenino">Femenino</option>
                        </select>
                </div>
                <div class="form-group">
               <a href="<?php echo RUTA_URL;?>home/"class="btn btn-danger">Cancelar</a>
               
              <button type="submit" class="btn btn-primary">Guardar</button>
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