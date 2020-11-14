<?php
session_start();
if (isset($_SESSION['id_usuario'])) {
    redirecionar('clientes');
} else {

    ?>

<?php require_once RUTA_APP . "/views/inc/header.php";?>
<?php require_once RUTA_APP . "/views/inc/navbar.php";?>

<div class="fondo">
    <br>
<div class="container mt-5">
        <div class="row mt-3 align-items-center">
          <div class="col-md-6 mx-auto">
          <div class="card">  
                <div class="card-header">
                    <div class="card-title">
                    <?php echo $datos['titulo']?>
                    </div>
                </div> 
                <div class="card-body">
                
                        <p><?php echo $datos['message']?></p>
                        <p class="text-center"><a href="<?php echo RUTA_URL?>/login">Iniciar sesion</a></p>
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
require_once RUTA_APP . "/views/inc/footer.php"?>