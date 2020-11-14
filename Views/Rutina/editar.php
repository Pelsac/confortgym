<?php require_once RUTA_APP."/views/plantilla/header.php";?>
<?php require_once RUTA_APP."/views/plantilla/navbar.php";?>
<?php require_once RUTA_APP."/views/plantilla/sidebar.php";?>
<div class="content-wrapper">
<?php require_once RUTA_APP."/views/plantilla/content-header.php";?>
 <section class="content">
      <div class="container-fluid">

        <div class="row">
        <form action="<?php echo RUTA_URL?>rutinas/editar/<?php echo $datos['codigo']?>" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="row">
              <div class="col-md-6">
               <div class="form-group">
                    <label for="">Nombre de rutina</label>
                    <input name="nombre" value="<?php echo $datos['nombre'] ?>" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Descripcion general</label>
                    <textarea name="descripcion" type="text" class="form-control"><?php echo $datos['descripcion'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="">Descripcion corta</label>
                    <textarea name="descripcion_corta" type="text" class="form-control"><?php echo $datos['descripcion_c'] ?></textarea>
                </div>
               
               </div>
               
               <div class="col-md-6">
                
                <div class="form-group">
                    <label for="">Frase Motivacional</label>
                    <input type="text" name="frase" value="<?php echo $datos['frase'] ?>"class="form-control">
                </div>
               </div>
               
               </div>
              </div>
               
          
            <div class="modal-footer justify-content-between">
             
              <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
            </form>
        </div>



      </div>
 </section>
</div>
<?php require_once RUTA_APP."/views/plantilla/footer.php" ?>
