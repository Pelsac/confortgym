<?php require_once RUTA_APP . "/views/inc/header.php"?>
<?php require_once RUTA_APP . "/views/inc/navbar.php"?>
  <div class="container">
        <div class="row p-5">
            <div class="col-md-8">

        <?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (count($errors) > 0) {
        resultBlock($errors);
    }
?>
         <div class="card p-4">
                    <h3>Crear una cuenta nueva!</h3>
                    <div class="card-body">
                        <form action="<?php echo RUTA_URL; ?>login/registrar" method="POST">

                            <div class="form-group">
                                <label for="">Nombres</label>
                                <input type="text" name="nombres" value="<?php echo $datos['cliente']['nombres'] ?>" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <input type="text" name="apellidos" value="<?php echo $datos['cliente']['apellidos'] ?>" class="form-control form-control-sm">
                            </div><div class="form-group">
                                <label for="">Fecha de nacimiento</label>
                                <input type="date" name="fecha" value="<?php echo $datos['cliente']['fecha'] ?>"class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                           <label>Genero</label>
                            <select name="genero" class="form-control">
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                                <option value="otros">otros</option>
                                
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="">Alias</label>
                                <input type="text" name="alias" value="<?php echo $datos['nombre'] ?>"class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="">Contraseña</label>
                                <input type="password" name="password"class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="">Confirmar contraseña</label>
                                <input type="password" name="con_password"class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="correo" value="<?php echo $datos['correo'] ?>"class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Crear nueva cuenta</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  </div>
<?php    
}else{


?>
                <div class="card p-4">
                    <h3>Crear una cuenta nueva!</h3>
                    <div class="card-body">
                        <form action="<?php echo RUTA_URL; ?>login/registrar" method="POST">

                            <div class="form-group">
                                <label for="">Nombres</label>
                                <input type="text" name="nombres" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <input type="text" name="apellidos" class="form-control form-control-sm">
                            </div><div class="form-group">
                                <label for="">Fecha de nacimiento</label>
                                <input type="date" name="fecha" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                           <label>Genero</label>
                            <select name="genero" class="form-control">
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                                <option value="otros">otros</option>
                                
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="">Alias</label>
                                <input type="text" name="alias" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="">Contraseña</label>
                                <input type="password" name="password"class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="">Confirmar contraseña</label>
                                <input type="password" name="con_password"class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="correo"class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Crear nueva cuenta</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  </div>
<?php } require_once RUTA_APP . "/views/inc/footer.php"?>