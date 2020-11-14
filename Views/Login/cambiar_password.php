<?php
session_start();
if (isset($_SESSION['id_usuario'])) {
    redirecionar('clientes');
} else {

    ?>

<?php require_once RUTA_APP . "/views/inc/header.php";?>
<?php require_once RUTA_APP . "/views/inc/navbar.php";?>

<div class="fondo">
<div class="container">
        <div class="row mt-3 align-items-center">
          <div class="col-md-6 mx-auto">
          <div class="card">  
                <div class="card-header">
                    <div class="card-title">
                        Cambiar Contraseña
                    </div>
                </div> 
                <div class="card-body">
                
                <form action="<?php echo RUTA_URL ?>login/guardar_password" method="POST">

                  <div class="form-group">
                  <label for="">Nueva contraseña</label>
                  <input class="form-control" name="id" value="<?php echo $datos['id']?>" type="hidden" >
                  <input class="form-control" name="token" value="<?php echo $datos['token']?>" type="hidden" >
                  <input type="password" name="password1" class="form-control" placeholder="Escribir contraseña">
                  </div>
                  <div class="form-group">
                  
                  <label for="">Confirmar contraseña</label>
                  <input type="password" name="password2" class="form-control" placeholder="Confirmar contraseña">
                  </div>
                         
                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Modificar</button>
                        </div>
                        
                  </form>
                </div>    
                                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {

                        if (count($errors) > 0) {
                            resultBlock($errors);
                        }
                    }
                    ?>     
            </div>
         </div>
        </div>
    </div>

  <footer class="blockquote-footer">
      <span>
      Foto de Hombre creado por javi_indy - <a  href='https://www.freepik.es/fotos/hombre'> www.freepik.es</a>
      </span>

</footer>
</div>





    <?php }
require_once RUTA_APP . "/views/inc/footer.php"?>