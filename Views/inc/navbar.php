<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
        <a href="" class="navbar-brand">ConfortGym</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarsExample05">
           <ul class="navbar-nav ml-auto">
             
           
            <?php if(isset($_SESSION['id_usuario'])){?>

                  <li class="nav-item">
                  <a href="<?php echo RUTA_URL;?>login/cerrarSesion" class="nav-link">
                  <i class="fas fa-dumbbell"></i>
                  Mis rutinas</a>
            </li> <li class="nav-item">
                 
            </li>
            <li class="nav-item">
                  <a href="<?php echo RUTA_URL;?>login/cerrarSesion" class="nav-link"> <i class="fas fa-sign-out-alt"></i> Salir</a>
            </li>
            <?php }else{?>
            <li class="nav-item">
                 <a href="<?php echo RUTA_URL;?>" class="nav-link">Iniciar Sesion</a>
            </li>
            <li class="nav-item">
                  <a href="<?php echo RUTA_URL;?>login/crear_usuario" class="nav-link">!Registrate!</a>
            </li>
            <?php }?>
            </u>
        </div>   
        </div>      
    </nav>

    