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
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
                  Agregar Producto
        </button>
            </div>
            <div class="col-md-12 mt-3">
                <div class="card">
                <div class="card-body table-responsive" style="height:400px;">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre </th>
                            <th>Descripcion</th>
                            <th>stock</th>
                            <th>precio</th>
                            <th>Cantidad</th>
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
                            <td><?php echo $producto->stock ?></td>
                            <td><?php echo $producto->precio ?></td>
                            <td><?php echo $producto->cantidad ?></td>
                            <td><img class="img-md" src="<?php echo ".".$producto->imagen ?>" alt=""></td>
                           
                                                        
                            <td>
                            <a href="<?php echo RUTA_URL;?>productos/editar/<?php echo $producto->codigo?>" class="btn btn-primary">Editar</a>
                           
                           <button  data-toggle="modal" data-target="#s<?php echo$producto->codigo?>"  class="btn btn-danger">Eliminar</button>
                             
                       </td>
                       </tr>
                       <?php require RUTA_APP."/views/productos/eliminar.php";
                       ?>  
                       <?php endforeach ?>
                   </tbody>
                </table>
                </div>
                </div>
            </div>
            <?php require_once RUTA_APP."/views/productos/add.modal.php"?>
        </div>
      </div>
 </section>
</div>
<?php require_once RUTA_APP."/views/plantilla/footer.php" ?>
<script>
