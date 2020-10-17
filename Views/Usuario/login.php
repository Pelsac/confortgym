<?php require_once RUTA_APP."/Views/inc/header.php"; ?>
<?php require_once RUTA_APP."/Views/inc/navbar.php"; ?>



<div class="container">
    <div class="row p-5">
    <div class="col-md-8">
    
    </div>
    <div class="col-md-4 float-left">
        <div class="card">
            
            <div class="card-body">
                <form action="usuario" method="POST">
                        <h3>Iniciar sesion</h3>
                        <div class="form-group">
                        <label for="">Ingresar usuario:</label>
                        <input class="form-control" name="usuario" type="text" placeholder="Nombre de usuario">
                        </div>
                        <div class="form-group">
                        <label for="">Ingresar Contraseña:</label>
                        <input class="form-control" name="contrasena"type="password" placeholder="Contraseña">
                        </div>
                    <p><a href="">¿olvidaste tu contraseña?</a></p>
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
    </div>

</div>

    
<?php require_once RUTA_APP."/Views/inc/footer.php" ?>