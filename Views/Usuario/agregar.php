<?php require_once RUTA_APP."/Views/plantilla/header.php";?>
<?php require_once RUTA_APP."/Views/plantilla/navbar.php";?>
<?php require_once RUTA_APP."/Views/plantilla/sidebar.php";?>


<div class="content-wrapper">
<?php require_once RUTA_APP."/Views/plantilla/content-header.php";?>
 <section class="content">
      <div class="container-fluid">
      <form action="<?php echo RUTA_URL?>usuarios/agregar" method="POST">
            <div class="row">
            
                    <div class="col-md-6">
                         <div class="form-group">
                                <label>Rol</label>
                                <select name="id_rol" class="form-control">
                                <?php foreach($datos['roles'] as $rol): ?>
                                <option value="<?php echo $rol->id?>"><?php echo $rol->rol?></option>
                                    
                                <?php endforeach ?>
                                </select>
                             </div>
                             <div class="form-group">
                                <label for="">Nombre usuario</label>
                                <input name="alias" type="text" class="form-control" >
                             </div>
                             <div class="form-group">
                                     <label for="">Correo</label>
                                    <input name="correo" type="email" class="form-control" >
                             </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                            <label for="">Contraseña</label>
                            <input name="password" type="password" class="form-control" >
                        </div>
                
                        <div class="form-group">
                            <label for="">Confirmar contraseña</label>
                            <input type="text" type="password"  name="con_password" class="form-control" >
                        </div>
                        
                        <div class="form-group">
                                <button type="reset" class="btn btn-danger">limpiar</button>
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                        </div>

                        <div class="form-group">
                        <?php
                                if( $_SERVER['REQUEST_METHOD'] == "POST"){
                        
                                    if(count($errors)>0){
                                        resultBlock($errors); 
                                    }
                                }        
                                ?>
                        </div>
                    </div>
                   
            </div>
            </form>
      </div>
 </section>

<?php require_once RUTA_APP."/Views/plantilla/footer.php" ?>

