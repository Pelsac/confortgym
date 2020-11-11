
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
                  Agregar Ejercicio
        </button>
            </div>
            <div class="col-md-12 mt-3">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombre </th>
                            <th>duracion</th>
                            <th>descripcion</th>
                            <th>repeticiones</th>
                            <th>avatar</th>
                            <th>tipo de ejercicio</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                    <?php foreach($datos['ejercicios'] as $ejercicio): ?>
                        <tr>
                           <td><?php  echo $ejercicio->id_ejer ?></td>
                            <td><?php echo $ejercicio->nombre ?></td>
                            <td><?php echo $ejercicio->duracion ?></td>
                            <td><?php echo $ejercicio->descripcion ?></td>
                            <td><?php echo $ejercicio->repeticiones ?></td>
                            <td><img class="img-fluid brand-image-xs" src="<?php echo ".".$ejercicio->animacion ?>" alt=""></td>
                            <td><?php echo $ejercicio->categoria ?></td>
                            
                            
                            <td>
                            <a href="<?php echo RUTA_URL;?>ejercicios/editar/<?php echo $ejercicio->id_ejer?>" class="btn btn-primary">Editar</a>
                     
                            <button  data-toggle="modal" data-target="#modal-default"  class="btn btn-danger">Eliminar</button>
                              
                        </td>
                        </tr>                 
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <?php require_once RUTA_APP."/views/Ejercicios/add.modal.php"?>
        </div>
      </div>
 </section>
</div>
<?php require_once RUTA_APP."/views/plantilla/footer.php" ?>
