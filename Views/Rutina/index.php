
<?php require_once RUTA_APP."/Views/plantilla/header.php";?>
<?php require_once RUTA_APP."/Views/plantilla/navbar.php";?>
<?php require_once RUTA_APP."/Views/plantilla/sidebar.php";?>
<div class="content-wrapper">
<?php require_once RUTA_APP."/Views/plantilla/content-header.php";?>
 <section class="content">
      <div class="container-fluid">
    <!--  aqui va el diseño !-->
        <div class="row">
            <div class="col-md-3 mt-3">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
                  Agregar Nueva Rutina
        </button>
            </div>
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body table-responsive"style="height:auto;">
                <table class="table table-head-fixed text-nowrap" id="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombre de la rutina</th>
                            <th>descripcion</th>     
                            <th>id_nivel</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                    <?php foreach($datos['rutinas'] as $rutina): ?>
                        <tr>
                            <td><?php echo $rutina->codigo ?></td>
                            <td><?php echo $rutina->nombre_rutina ?></td>
                            <td><?php echo $rutina->descripcion_rutina ?></td>
                            <td><?php echo $rutina->id_nivel ?></td>
                            
                            <td>
                            <a href="<?php echo RUTA_URL;?>rutinas/editar/<?php echo $rutina->codigo?>" class="btn btn-warning text-white">Editar</a>
                           
                            <a href="<?php echo RUTA_URL;?>rutinas/detalles/<?php echo $rutina->codigo?>" class="btn btn-info">Ver rutina</a>
                              
                        </td>
                        </tr>
                        
                        <?php endforeach ?>
                    </tbody>
                </table>
                </div>
                </div>
            </div>
            <?php require_once RUTA_APP."/Views/Rutina/add.modal.php"?>
        </div>
      </div>
 </section>
</div>
<?php require_once RUTA_APP."/Views/plantilla/footer.php" ?>
