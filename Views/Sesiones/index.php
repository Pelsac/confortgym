
<?php require_once RUTA_APP."/Views/plantilla/header.php";?>
<?php require_once RUTA_APP."/Views/plantilla/navbar.php";?>
<?php require_once RUTA_APP."/Views/plantilla/sidebar.php";?>
<div class="content-wrapper">
<?php require_once RUTA_APP."/Views/plantilla/content-header.php";?>
 <section class="content">
      <div class="container-fluid">
    <!--  aqui va el diseño !-->
        <div class="row">
           
            <div class="col-11 mt-3">
            <div class="card">
                    <div class="card-body table-responsive"style="height:auto;">
                     <table class="table" id="table" data-page-length="5">
                    <thead>
                        <tr>
                            <th>id sesion</th>
                            <th>Asistencia</th>  
                            <th>cliente</th>   
                            <th>Fecha </th>
                            <th>Hora </th>
                            <th>Estado</th>
                         
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
                            
                            <td><?php echo $se->estado?></td>

                            <td>
                            <a href="<?php echo RUTA_URL;?>sesiones/aprobar/<?php echo $se->id_sesion?>/<?php echo $se->codigo_cliente ?>" class="btn btn-primary text-white">Aprobar</a>
                            <a href="<?php echo RUTA_URL;?>sesiones/rechazar/<?php echo $se->id_sesion?>/<?php echo $se->codigo_cliente ?>" class="btn btn-warning text-white">Rechazar</a>
                            
                          </td>
                        </tr>
                        
                        <?php endforeach ?>
                    </tbody>
                </table>
                </div>
                </div>
            </div>
            <?php require_once RUTA_APP."/Views/Sesiones/add.modal.php"?>
        </div>
      </div>
 </section>
</div>
<?php require_once RUTA_APP."/Views/plantilla/footer.php" ?>
<script>
