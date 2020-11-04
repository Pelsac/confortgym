
<?php require_once RUTA_APP."/Views/plantilla/header.php";?>
<?php require_once RUTA_APP."/Views/plantilla/navbar.php";?>
<?php require_once RUTA_APP."/Views/plantilla/sidebar.php";?>
<div class="content-wrapper">
 <section class="content">
<?php require_once RUTA_APP."/Views/plantilla/content-header.php";?>
      <div class="container-fluid">
    <!--  aqui va el diseño !-->
        <div class="row">
            <div class="col-md-3 mt-3">
            <a type="button" href="<?php echo RUTA_URL;?>clientes/agregar"class="btn btn-success" >
                  Agregar cliente
            </a>
          </div>
          </div>
          <div class="row">
            <div class="col-md-12 mt-3">
            <div class="card">
                    <div class="card-body">
                    <table class="table table-responsive-md" id="table">
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
                           
                            <button  data-toggle="modal" data-target="#s<?php echo$cliente->id?>"  class="btn btn-danger">Eliminar</button>
                              
                        </td>
                        </tr>
                        <?php require RUTA_APP."/Views/Cliente/eliminar.modal.php";
                        ?>  
                        <?php endforeach ?>
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
            </div>
            <?php require_once RUTA_APP."/Views/Cliente/add.modal.php"?>
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
