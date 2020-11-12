<?php require_once RUTA_APP."/views/plantilla/header.php";?>
<?php require_once RUTA_APP."/views/plantilla/navbar.php";?>
<?php require_once RUTA_APP."/views/plantilla/sidebar.php";?>


<div class="content-wrapper">
<?php require_once RUTA_APP."/views/plantilla/content-header.php";?>
 <section class="content">
      <div class="container-fluid">
    <!--  aqui va el diseño !-->
        <div class="row">
            <div class="col-md-3 mt-3">
            <a type="button" class="btn btn-success" href="<?php echo RUTA_URL;?>usuarios/agregar">
                  Agregar usuario
        </a>
            </div>
            <div class="col-md-12 mt-3">
            <div class="card">
                    <div class="card-body table-responsive"style="height:auto;">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Ultima session</th>
                            <th>Fecha de registro</th>
                            <th>id rol</th>
                            
                            <th>Esta activo</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                    <?php foreach($datos['usuarios'] as $user): ?>
                        <tr>
                            <td><?php echo $user->id ?></td>
                            <td><?php echo $user->alias ?></td>
                            <td><?php echo $user->correo ?></td>
                            <td><?php echo $user->last_session ?></td>
                            <td><?php echo $user->fecha_registro ?></td>
                            <td><?php echo $user->id_rol ?></td>
                          
                            <td><?php echo $user->activo ?></td>
                          
                            <td>
                            <a href="<?php echo RUTA_URL;?>usuarios/editar/<?php echo $user->id?>" class="btn btn-primary">Editar</a>
                            <?php require_once RUTA_APP."/views/usuario/eliminar.modal.php"?>  
                            <button  data-toggle="modal" data-target="#s<?php echo$user->id?>"  class="btn btn-danger">Eliminar</button>
                              
                        </td>
                        </tr>
                        <?php require RUTA_APP."/views/usuario/eliminar.modal.php";
                        ?>  
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            </div> 
        </div>
        </div>
      </div>
 </section>

<?php require_once RUTA_APP."/views/plantilla/footer.php" ?>
