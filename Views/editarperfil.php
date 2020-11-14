<?php require_once RUTA_APP."/views/inc/header.php";?>
<?php require_once RUTA_APP."/views/inc/navbar.php";?>
<div class="container mt-5 p-5">
    <div class="row">
            <div class="col-md-12 col-gl-12">
            <input type="hidden" id="id_user" value= "<?php echo $_SESSION['identificacion'] ?>">
                 <h3>Datos de tu perfil:</h3>
                 <div class="form-group mt-3 float-right">
                     <label for="">¿Que quieres hacer?</label><br>
                      <a href="<?php echo RUTA_URL;?>home/actualizar_datos" class="btn btn-outline-primary">Actualizar datos</a>
                      <a href="<?php echo RUTA_URL;?>home/actualizar_clave" class="btn btn-outline-primary">Cambiar contraseña</a>
                  </div>
            </div>
            <div class="col-md-12">
                <form action="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input  disabled type="text" value="<?php echo $datos['cliente']->nombres?>"class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                        <label for="">Apellidos</label>
                                        <input  disabled type="text"  value="<?php echo $datos['cliente']->apellidos?>"class="form-control">
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                        <label for="">Fecha Nacimiento</label>
                                        <input disabled  type="date" value="<?php echo $datos['cliente']->fecha_nacimiento?>" class="form-control">
                            </div>
                            <div class="form-group">
                                    <label for="">Genero</label>
                                    <input disabled  type="text"  value="<?php echo $datos['cliente']->genero?>"  class="form-control">
                            </div>
                            <div class="form-group">
                                        <label for="">Correo electronico</label>
                                        <input type="text" disabled  value="<?php echo $datos['usuario']->correo?>"class="form-control">
                             </div>
                             <div class="form-group">
                                        <label for="">Alias</label>
                                        <input type="text" disabled  value="<?php echo $datos['usuario']->alias ?>"class="form-control">
                             </div>
                             
                            </div>
                        </div>
                </form>
        
            
    
        
                
             </div>
         </div>
    </div>
</div>
<?php require_once RUTA_APP."/views/inc/footer.php" ?>
<script src="<?php echo RUTA_URL ?>/assets/alertifyjs/alertify.min.js"></script>
<script src="<?php echo RUTA_URL ?>/assets/js/index.js"></script>