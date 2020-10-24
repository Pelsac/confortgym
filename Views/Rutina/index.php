
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
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombre de la rutina</th>
                            <th>descripcion</th>
                            <th>tipo de rutina</th>
                            <th>id_rutina</th>
                            <th>id_nivel</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                    <?php foreach($datos['rutinas'] as $rutina): ?>
                        <tr>
                            <td><?php echo $rutina->codigo ?></td>
                            <td><?php echo $rutina->nombre_rutina ?></td>
                            <td><?php echo $rutina->descripcion ?></td>
                            <td><?php echo $rutina->tipo_rutina ?></td>
                            <td><?php echo $rutina->id_nivel ?></td>
                            
                            <td>
                            <a href="<?php echo RUTA_URL;?>clientes/editar/<?php echo $rutina->id?>" class="btn btn-primary">Editar</a>
                            <?php require_once RUTA_APP."/Views/Cliente/eliminar.modal.php"?>  
                            <button  data-toggle="modal" data-target="#modal-default"  class="btn btn-danger">Eliminar</button>
                              
                        </td>
                        </tr>
                        
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <?php require_once RUTA_APP."/Views/Rutina/add.modal.php"?>
        </div>
      </div>
 </section>
</div>
<?php require_once RUTA_APP."/Views/plantilla/footer.php" ?>