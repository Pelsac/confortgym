<?php require_once RUTA_APP."/views/plantilla/header.php";?>
<?php require_once RUTA_APP."/views/plantilla/navbar.php";?>
<?php require_once RUTA_APP."/views/plantilla/sidebar.php";?>
<div class="content-wrapper">
<?php require_once RUTA_APP."/views/plantilla/content-header.php";?>
 <section class="content">
      <div class="container-fluid">
      <form action="<?php echo RUTA_URL?>usuarios/agregar" method="POST">
            <div class="row">
            
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                             <?php
                                if( $_SERVER['REQUEST_METHOD'] == "POST"){
                        
                                    if(count($errors)>0){
                                        resultBlock($errors); 
                                    }?>
                                    <br>
                         <br>
                            <div class="form-group">
                                <label for="">Nombres</label>
                                <input type="text" name="nombres" value="<?php echo $datos['nombre'] ?>" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <input type="text" name="apellidos" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="">Codigo de ingreso</label>
                                 <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button type="button" id="cargar" class="btn btn-primary">Cargar</button>
                                    </div>
                                    <!-- /btn-group -->
                                    <input type="text"  name="codigo" id="codigo" class="form-control">
                                    
                                </div>
                                <p id="message"></p>
                            </div>

                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Fecha de nacimiento</label>
                                <input type="date" name="fecha" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                           <label>Genero</label>
                            <select name="genero" class="form-control form-control-sm">
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                                <option value="otros">otros</option>
                                
                            </select>
                            </div>
                           
                         
                            </div>
                            
                        </div>
  
                             </div>
                                 <div class="col-md-6">
                                     <h3>Datos de usuario</h3>
                                 </div>
                             <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                         <div class="form-group">
                                            <label>Rol</label>
                                            <select name="id_rol" class="form-control form-control-sm">
                                            <?php foreach($datos['roles'] as $rol): ?>
                                            <option value="<?php echo $rol->id?>"><?php echo $rol->rol?></option>
                                                
                                            <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nombre usuario</label>
                                            <input name="alias" type="text" class="form-control form-control-sm" >
                                        </div>
                                        <div class="form-group">
                                                <label for="">Correo</label>
                                                <input name="correo" type="email" class="form-control form-control-sm" >
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Contraseña</label>
                                        <input name="password" type="password" class="form-control form-control-sm" >
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="">Confirmar contraseña</label>
                                        <input type="password"  name="con_password" class="form-control form-control-sm" >
                                    </div>
                                    <div class="form-group ">
                                  
                                        <button type="reset" class="btn btn-danger">limpiar</button>
                                        <button type="submit" class="btn btn-primary">Aceptar</button>
                                    </div>
                                    </div>
                                </div>
                             
                             </div>
                             <?php    }else{

                                      
                                ?>
                         <br>
                         <br>
                            <div class="form-group">
                                <label for="">Nombres</label>
                                <input type="text" name="nombres" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <input type="text" name="apellidos" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="">Codigo de ingreso</label>
                                 <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button type="button" id="cargar" class="btn btn-primary">Cargar</button>
                                    </div>
                                    <!-- /btn-group -->
                                    <input type="text"  name="codigo" id="codigo" class="form-control">
                                    
                                </div>
                                <p id="message"></p>
                            </div>

                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Fecha de nacimiento</label>
                                <input type="date" name="fecha" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                           <label>Genero</label>
                            <select name="genero" class="form-control form-control-sm">
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                                <option value="otros">otros</option>
                                
                            </select>
                            </div>
                           
                         
                            </div>
                            
                        </div>
  
                             </div>
                                 <div class="col-md-6">
                                     <h3>Datos de usuario</h3>
                                 </div>
                             <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                         <div class="form-group">
                                            <label>Rol</label>
                                            <select name="id_rol" class="form-control form-control-sm">
                                            <?php foreach($datos['roles'] as $rol): ?>
                                            <option value="<?php echo $rol->id?>"><?php echo $rol->rol?></option>
                                                
                                            <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nombre usuario</label>
                                            <input name="alias" type="text" class="form-control form-control-sm" >
                                        </div>
                                        <div class="form-group">
                                                <label for="">Correo</label>
                                                <input name="correo" type="email" class="form-control form-control-sm" >
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Contraseña</label>
                                        <input name="password" type="password" class="form-control form-control-sm" >
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="">Confirmar contraseña</label>
                                        <input type="password"  name="con_password" class="form-control form-control-sm" >
                                    </div>
                                    <div class="form-group ">
                                  
                                        <button type="reset" class="btn btn-danger">limpiar</button>
                                        <button type="submit" class="btn btn-primary">Aceptar</button>
                                    </div>
                                    </div>
                                </div>
                             
                             </div>
                   
            </div>
            </form>
        <br>
        <br>
        <br>

      </div>
      </div>
 </section>

                                            <?php }require_once RUTA_APP."/views/plantilla/footer.php" ?>
