
<?php require_once RUTA_APP."/views/plantilla/header.php";?>
<?php require_once RUTA_APP."/views/plantilla/navbar.php";?>
<?php require_once RUTA_APP."/views/plantilla/sidebar.php";?>
<div class="content-wrapper">
 <section class="content">
<?php require_once RUTA_APP."/views/plantilla/content-header.php";?>
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
                    <div class="card-body table-responsive">
                    <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>fecha Nacimiento</th>
                            <th>edad</th>
                            <th>Genero</th>
                            <th>Codigo ingreso</th>
                            <th>En rutina</th>
                            <th>Usuario</th>
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
                            <td><?php echo $cliente->en_rutina ?></td>
                            <td><?php echo $cliente->cod_usuario ?></td>
                            <td>
                            <a href="<?php echo RUTA_URL;?>clientes/editar/<?php echo $cliente->id?>" class="btn btn-primary">Editar</a>
                           
                            <button  data-toggle="modal" data-target="#s<?php echo$cliente->id?>"  class="btn btn-danger">Eliminar</button>
                              
                        </td>
                        </tr>
                        <?php require RUTA_APP."/views/cliente/eliminar.modal.php";
                        ?>  
                        <?php endforeach ?>
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
            </div>
            
        </div>
      </div>
      
 </section>
</div>
<?php require_once RUTA_APP."/views/plantilla/footer.php" ?>
