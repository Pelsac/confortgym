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
                  Agregar Producto
        </button>
            </div>
            <div class="col-md-12 mt-3">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre </th>
                            <th>Descripcion</th>
                            <th>Imagen</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                    <?php foreach($datos['productos'] as $producto): ?>
                        <tr>
                           <td><?php  echo $producto->codigo ?></td>
                            <td><?php echo $producto->nombre ?></td>
                            <td><?php echo $producto->descripcion ?></td>
                         
                            <td><img class="img-fluid brand-image-xs" src="<?php echo ".".$producto->imagen ?>" alt=""></td>
                           
                                                        
                            <td>
                            <a href="<?php echo RUTA_URL;?>productos/editar/<?php echo $producto->codigo?>" class="btn btn-primary">Editar</a>
                           
                           <button  data-toggle="modal" data-target="#s<?php echo$producto->codigo?>"  class="btn btn-danger">Eliminar</button>
                             
                       </td>
                       </tr>
                       <?php require RUTA_APP."/Views/Productos/eliminar.php";
                       ?>  
                       <?php endforeach ?>
                   </tbody>
                </table>
            </div>
            <?php require_once RUTA_APP."/Views/Productos/add.modal.php"?>
        </div>
      </div>
 </section>
</div>
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
} );
</script>