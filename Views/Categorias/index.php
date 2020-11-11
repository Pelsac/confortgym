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
        
            <form action="<?php echo RUTA_URL?>categorias/agregar" method="POST">
                <div class="form-group">
                <label for=""> Agregar Categoria</label>
                    <input type="text" class="form-control" name="cat" placeholder="ingrese la categoria">    
                </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Agregar</button>
                    </div>
            </form>
                
            </div>
            
            <div class="col-md-12 mt-3">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Categoria</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                    <?php foreach($datos['categorias'] as $cat): ?>
                        <tr>
                            <td><?php echo $cat->id ?></td>
                            <td><?php echo $cat->categoria ?></td>      
                            <td>
                           
                            <a href="<?php echo RUTA_URL;?>categorias/editar/<?php echo $cat->id?>" class="btn btn-primary">Editar</a>
                            <button  data-toggle="modal" data-target="#<?php echo $cat->categoria?>" class="btn btn-danger">Eliminar</button>
                            
                        </td>
                        </tr>
                        
                        <?php require RUTA_APP."/views/Categorias/eliminar.modal.php"?>  
                        <?php endforeach ?>
                       
                    </tbody>
                </table>
            </div>
            <?php require_once RUTA_APP."/views/Rutina/add.modal.php"?>
        </div>
      </div>
 </section>
</div>
<?php require_once RUTA_APP."/views/plantilla/footer.php" ?>
<script>
