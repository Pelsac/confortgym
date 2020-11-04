
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
           
            </div>
            <div class="col-md-12 mt-3">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>id sesion</th>
                         
                            <th>Asistencia</th>  
                            <th>cliente</th>   
                            <th>Fecha </th>
                            <th>Hora </th>
                            <th>activa </th>
                         
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                    <?php foreach($datos['sesiones'] as $se): ?>
                        <tr>
                            <td><?php echo $se->id_sesion ?></td>
                            <td><?php echo $se->asistencia ?></td>
                            <td><?php echo $se->nombres." ".$se->apellidos?></td>
                            <td><?php echo $se->fecha ?></td>
                            <td><?php echo $se->hora_ingreso ?></td>
                            <td><?php echo $se->activo?></td>

                            <td>
                            <a href="<?php echo RUTA_URL;?>rutinas/editar/<?php echo $rutina->codigo?>" class="btn btn-warning text-white">Aprobar</a>
                           
                        
                              
                        </td>
                        </tr>
                        
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <?php require_once RUTA_APP."/Views/Sesiones/add.modal.php"?>
        </div>
      </div>
 </section>
</div>
<?php require_once RUTA_APP."/Views/plantilla/footer.php" ?>
<script>
$(document).ready(function() {
    $('#table').DataTable();
} );
</script>