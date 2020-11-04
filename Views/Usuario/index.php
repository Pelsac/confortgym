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
                  Agregar usuario
        </button>
            </div>
            <div class="col-md-12 mt-3">
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
                            <a href="<?php echo RUTA_URL;?>clientes/editar/<?php echo $user->id?>" class="btn btn-primary">Editar</a>
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

<?php require_once RUTA_APP."/Views/plantilla/footer.php" ?>
<script>
$(document).ready(function() {
    $('#table').DataTable({
        language:{
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }}});
})        
  

</script>