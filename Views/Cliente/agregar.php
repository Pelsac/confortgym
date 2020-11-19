

<?php require_once RUTA_APP."/views/plantilla/header.php";?>
<?php require_once RUTA_APP."/views/plantilla/navbar.php";?>
<?php require_once RUTA_APP."/views/plantilla/sidebar.php";?>
<div class="content-wrapper">

 <section class="content">
 <?php require_once RUTA_APP."/views/plantilla/content-header.php";?>
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
            <?php
        if( $_SERVER['REQUEST_METHOD'] == "POST"){
   
            if(count($errors)>0){
                resultBlock($errors); 
            }
        }        
         ?>
            <form action="<?php echo RUTA_URL?>clientes/agregar" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        
                <div class="form-group">
                    <label for="">Nombres</label>
                    <input name="nombres" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Apellidos</label>
                    <input name="apellidos" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Fecha nacimiento</label>
                    <input name="fecha" type="date" class="form-control" required>
                </div>
               
           
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                <label>genero</label>
                        <select name="genero" class="form-control">
                          <option value="masculino">Masculino</option>
                          <option value="femenino">Femenino</option>
                          <option value="femenino">otro</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="">Codigo de ingreso</label>
                    <input type="text" name="codigo" class="form-control" >
                </div>
              
                <div class="form-group">
         
              <button type="submit" class="btn btn-primary">Aceptar</button>
           </div>
            </div>
                    </div>
                </div>
              
        
            </form>
            </div>
        </div>
    </div>

</section>
</div>

<?php require_once RUTA_APP."/views/plantilla/footer.php" ?>
