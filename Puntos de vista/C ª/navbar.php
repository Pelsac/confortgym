<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
        <a href="<?php echo RUTA_URL ?>home" class="navbar-brand">ConfortGym</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarsExample05">
           <ul class="navbar-nav ml-auto">
             
           
            <?php if(isset($_SESSION['id_usuario'])){?>
                  <input type="hidden" name="" id="ruta" value="<?php echo RUTA_URL ?>">
                  <input type="hidden" id="id_user" value= "<?php echo $_SESSION['identificacion'] ?>">
                  <li class="nav-item">
                        <a href="<?php echo RUTA_URL;?>home/sesiones" class="nav-link"><i class="fas fa-clock"></i> Sesiones</a>
                  </li>
                  <li class="nav-item">
                  </li>
                  <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-user"></i> <?php echo $_SESSION['nombres']." ". $_SESSION['apellidos']?></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown03">
                              <a class="dropdown-item" href="<?php echo RUTA_URL;?>home/perfil_de_usuario"> <i class="fas fa-edit"></i> Editar perfil</a>
                             
                              <a href="<?php echo RUTA_URL;?>login/cerrarSesion" class="dropdown-item"> <i class="fas fa-sign-out-alt"></i> Salir</a>
                        </div>
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

    
