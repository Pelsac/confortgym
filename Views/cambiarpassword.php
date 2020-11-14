<?php require_once RUTA_APP."/views/inc/header.php";?>
<?php require_once RUTA_APP."/views/inc/navbar.php";?>
<div class="container mt-5 p-5">
    <div class="row m-auto justify-content-center">
             
                <h3 class="justify-content-center">Actualizar clave de acceso</h3>

    </div>
    <form action="<?php echo RUTA_URL;?>home/actualizar_clave" method="POST">
    <div class="row justify-content-center">
        
             
        <div class="col-md-6">
            <br>
        <label for="">Nueva contraseña</label>
             <div class="input-group">
               
                 <input id="txtPassword" type="password" name="clave1" class="form-control"type="password">
                 <div class="input-group-append">
            <button id="show_password" class="btn btn-primary show_password" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
          </div>
             </div>
             <br>
             <label for="">Confirmar contraseña</label>
             <div class="input-group">
                 
                 <input id="txtPassword1" type="password" name="clave2" class="form-control"type="password">
             <div class="input-group-append">
                <button id="show_password" class="btn btn-primary show_password" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
            </div>
                </div>
                <br>
             <div class="input-group">
                 <br>
                    <button type="submit" class="btn btn-block btn-outline-primary">Actualizar</button>
             </div>
       
        </div>
  
</div>
    </form>
    
</div>
<?php require_once RUTA_APP."/views/inc/footer.php" ?>
<script src="<?php echo RUTA_URL ?>/assets/alertifyjs/alertify.min.js"></script>
<script src="<?php echo RUTA_URL ?>/assets/js/index.js"></script>
<script type="text/javascript">
function mostrarPassword(){
        var cambio = document.getElementById("txtPassword");
        var cambio1 = document.getElementById("txtPassword1");
		if(cambio.type == "password" || cambio1.type == "password"){
            cambio.type = "text";
            cambio1.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
            cambio.type = "password";
            cambio1.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
	$(document).ready(function () {
	//CheckBox mostrar contraseña
	$('#ShowPassword').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});
</script>