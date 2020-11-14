<?php require_once RUTA_APP."/views/inc/header.php";?>
<?php require_once RUTA_APP."/views/inc/navbar.php";?>
    <div class="container p-5">
    <h3 class="p-4"><?php echo $datos['titulo']?></h3>
        <div class="row p-5">
        
            <div class="col-md-8">
            <div class="row">
            <h4><?php echo $datos['nombre'] ?></h4>
            <p class="text-justify"><?php echo $datos['descripcion']?></p>
            </div>
               <div class="row">
               <p>Ejercicios</p>

               <div class="col-md-12">
                    <?php  foreach($datos['rutinas'] as $rut):  ?>
                    <div class="card mt-2">
                        <div class="card-header">
                        <?php echo $rut->nombre ?>
                        </div>
                        <div class="car-body p-2">
                            <div class="row">
                            <div class="col-md-3"> 
                                <img src="../../<?php echo $rut->animacion ?>" alt="">
                            </div>
                            <div class="col-md-9 p-4 text-justify">
                                <p> Duracion: <?php echo $rut->duracion ?></p>
                                <p> Repeticiones: <?php echo $rut->repeticiones ?></p>
                                <p><?php echo $rut->descripcion ?></p>
                            </div>
                            </div>
                        </div>
                    </div>
                   <?php  endforeach ?>
                  
                   
               </div>
               </div>     

            </div>
            <div class="col-md-4">
                <img class="img-thumbnail" src="../..<?php echo $datos['banner'] ?>" alt="">
            </div>
        </div>
   
    </div>


<?php require_once RUTA_APP."/views/inc/footer.php" ?>
<script src="<?php echo RUTA_URL ?>/assets/alertifyjs/alertify.min.js"></script>

<script src="<?php echo RUTA_URL ?>/assets/js/index.js"></script>