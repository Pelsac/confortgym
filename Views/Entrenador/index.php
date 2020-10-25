<?php require_once RUTA_APP."/Views/plantilla/header.php";?>
<?php require_once RUTA_APP."/Views/plantilla/navbar.php";?>
<?php require_once RUTA_APP."/Views/plantilla/sidebar.php";?>
<div class="content-wrapper">
 <section class="content">
      <div class="container-fluid">
    <!--  aqui va el diseño !-->
        <div class="row">
            <div class="col-md-3 mt-3">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
                  Agregar Entrenador
        </button>
            </div>
            <div class="col-md-12 mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Identificacion</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Celular</th>
                            <th>Fecha Nacimiento</th>
                            <th>Direccion</th>
                            <th>Correo</th>
                            <th>Imagen</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                    <?php foreach($datos['entrenadores'] as $entrenador): ?>
                        <tr>
                            <td><?php echo $entrenador->identificacion ?></td>
                            <td><?php echo $entrenador->nombres ?></td>
                            <td><?php echo $entrenador->apellidos ?></td>
                            <td><?php echo $entrenador->celular ?></td>
                            <td><?php echo $entrenador->fecha_nacimiento ?></td>
                            <td><?php echo $entrenador->direccion ?></td>
                            <td><?php echo $entrenador->correo ?></td>
                            <td><?php echo $entrenador->imagen ?></td>
                            <td>
                            <a href="<?php echo RUTA_URL;?>entrenadores/editar/<?php echo $entrenador->identificacion?>" class="btn btn-primary">Editar</a>
                            <?php require_once RUTA_APP."/Views/Entrenador/eliminar.modal.php"?>  
                            <button  data-toggle="modal" data-target="#modal-default"  class="btn btn-danger">Eliminar</button>
                              
                        </td>
                        </tr>
                        
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <?php require_once RUTA_APP."/Views/Entrenador/add.modal.php"?>
        </div>
      </div>
 </section>
</div>
<?php require_once RUTA_APP."/Views/plantilla/footer.php" ?>
