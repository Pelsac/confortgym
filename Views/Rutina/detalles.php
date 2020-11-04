<?php require_once RUTA_APP."/Views/plantilla/header.php";?>
<?php require_once RUTA_APP."/Views/plantilla/navbar.php";?>
<?php require_once RUTA_APP."/Views/plantilla/sidebar.php";?>
<div class="content-wrapper">
<?php require_once RUTA_APP."/Views/plantilla/content-header.php";?>
 <section class="content">
      <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                <div class="callout callout-info">

                <h5><i class="fas fa-info"></i>  <?php echo $datos['nombre']?></h5>
                <p><?php echo $datos['descripcion']?></p>
                </div>
            </div>
            </div>
            <div class="row"> 
               <div class="col-md-12">
                <h5>Ejercicios</h5>
               </div>
            <?php foreach($datos['rutinas'] as $rut): ?>
               
                <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                <?php echo $rut->nombre?>
                                </div>
                                <div class="card-body">
                                <div class="row">
                                <div class="col-md-6">
                                <img class="img" src="<?php echo "../..".$rut->animacion?>" alt="">
                                </div>
                                <div class="col-md-6">
                                <p>
                                <?php echo $rut->descripcion?>
                                </p>
                                </div>
                                </div>
                               
                               
                                
                               
                                </div>
                           </div>
                </div>

            <?php endforeach ?>
       
            </div>
      </section>
</div>
<?php require_once RUTA_APP."/Views/plantilla/footer.php" ?>