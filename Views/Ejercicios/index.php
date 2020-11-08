
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
                           <td><?php  echo $ejercicio->id ?></td>
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

                        <img src="https://steemitimages.com/0x0/https://cdn.steemitimages.com/DQmNRU7Ndz6a2nMEXGbLeSSGfi6QFiKYHru3nE9pRoMMH9K/Crunch%20Abdominales.gif" alt="">
            
                        
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <?php require_once RUTA_APP."/Views/Ejercicios/add.modal.php"?>
        </div>
      </div>
 </section>
</div>
<?php require_once RUTA_APP."/Views/plantilla/footer.php" ?>
