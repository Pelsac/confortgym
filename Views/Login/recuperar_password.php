<?php
session_start();
if (isset($_SESSION['id_usuario'])) {
    redirecionar('clientes');
} else {

    ?>

<?php require_once RUTA_APP . "/Views/inc/header.php";?>
<?php require_once RUTA_APP . "/Views/inc/navbar.php";?>

<div class="fondo">

    <div class="container">
        <div class="row mt-3 align-items-center">
          <div class="col-md-6 mx-auto">
          <div class="card">  
                <div class="card-header">
                    <div class="card-title">
                        Recuperar contraseña
                    </div>
                </div> 
                <div class="card-body">
                <div class="form-group">
                            <p>Para recuperar tu contraseña por favor ingresa tu email</p>
                        </div>
                <form action="<?php echo RUTA_URL ?>login/restablecer_password" method="POST">

                  <div class="form-group">
                  
                  <input type="email" name="email" class="form-control" placeholder="Email">
                  </div>
                       
                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Enviar</button>
                        </div>
                        <hr>
                        <div class="form-group">
                         <p>No tienes una cuenta! <a href="">Registrate aqui</a></p>
                        </div>
                  </form>
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
    </div>

  <footer class="blockquote-footer">
      <span>
      Foto de Hombre creado por javi_indy - <a  href='https://www.freepik.es/fotos/hombre'> www.freepik.es</a>
      </span>

</footer>
</div>





    <?php }
require_once RUTA_APP . "/Views/inc/footer.php"?>