

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
                  Agregar cliente
        </button>
            </div>
            <div class="col-md-12 mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>fecha Nacimiento</th>
                            <th>edad</th>
                            <th>Genero</th>
                            <th>Codigo ingreso</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                    <?php foreach($datos['clientes'] as $cliente): ?>
                        <tr>
                            <td><?php echo $cliente->id ?></td>
                            <td><?php echo $cliente->nombres ?></td>
                            <td><?php echo $cliente->apellidos ?></td>
                            <td><?php echo $cliente->fecha_nacimiento ?></td>
                            <td><?php echo $cliente->edad ?></td>
                            <td><?php echo $cliente->genero ?></td>
                            <td><?php echo $cliente->cod_ingreso ?></td>
                            <td>
                            <a href="<?php echo RUTA_URL;?>clientes/editar/<?php echo $cliente->id?>" class="btn btn-primary">Editar</a>
                            <?php require_once RUTA_APP."/Views/Cliente/eliminar.modal.php"?>  
                            <button  data-toggle="modal" data-target="#modal-default"  class="btn btn-danger">Eliminar</button>
                              
                        </td>
                        </tr>
                        
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <?php require_once RUTA_APP."/Views/Cliente/add.modal.php"?>
        </div>
      </div>
 </section>
</div>
<?php require_once RUTA_APP."/Views/plantilla/footer.php" ?>
