<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
        <a href="" class="navbar-brand">ConfortGym</a>
           <ul class="navbar-nav ml-auto">
             <li class="nav-item">
                 <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
           
            <?php if(isset($_SESSION['id_usuario'])){?>
            <li class="nav-item">
                  <a href="<?php echo RUTA_URL;?>login/cerrarSesion" class="nav-link">Cerrar Sesion</a>
            </li>
            <?php }else{?>
            <li class="nav-item">
                 <a href="#" class="nav-link">Iniciar Sesion</a>
            </li>
            <li class="nav-item">
                  <a href="<?php echo RUTA_URL;?>login/crear_usuario" class="nav-link">!Registrate!</a>
            </li>
            <?php }?>
            </u>
        </div>         
    </nav>