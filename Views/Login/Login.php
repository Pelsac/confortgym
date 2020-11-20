<?php 

if($_SESSION['tipo_usuario'] == 1){ 

 redirecionar('clientes'); 
}else if( isset( $_SESSION['tipo_usuario'])){
    
    redirecionar('home'); 
 }else{ 

?>

<?php 

 require_once RUTA_APP."/views/inc/header.php"; ?>
<?php require_once RUTA_APP."/views/inc/navbar.php"; ?>

<div class="fondo">
<div class="container-fluid" >
    <div class="row p-5">
    <div class="col-md-8 d-none d-sm-none d-md-block">
    <h1 class="text-white" id="frase">NO ERES LO QUE LOGRAS...</h1>
    <h1 class="text-white" id="frase">ERES LO QUE</h1>
    <h1 class="text-white" id="frase"><span>SUPERAS.</span> </h1>
    </div>
    <div class="col-md-4 float-left">
        <div class="card">
            
            <div class="card-body">
                <form action="<?php echo RUTA_URL;?>login/iniciarSesion" method="POST">
                        <h3>Iniciar sesion</h3>
                        <div class="form-group">
                        <label for="">Ingresar usuario:</label>
                        
                        <input class="form-control" name="usuario" type="text" placeholder="Nombre de usuario">
                        </div>
                        <div class="form-group">
                        <label for="">Ingresar Contraseña:</label>
                        <input class="form-control" name="password"type="password" placeholder="Contraseña">
                        </div>
                    <p><a href="<?php echo RUTA_URL ?>login/recuperar_password">¿olvidaste tu contraseña?</a></p>
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </form>
            </div>
                 
        <?php
        if( $_SERVER['REQUEST_METHOD'] == "POST"){
   
            if(count($errors)>0){
                resultBlock($errors); 
            }
        }        
         ?>
        </div>
    </div>
    </div>
  <footer class="blockquote-footer">
      <span>
      Foto de Hombre creado por javi_indy - <a  href='https://www.freepik.es/fotos/hombre'> www.freepik.es</a>
      </span>

</footer>
</div>

</div>


    
    <?php  } require_once RUTA_APP."/views/inc/footer.php" ?>