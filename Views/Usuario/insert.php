<?php require_once RUTA_APP."/Views/inc/header.php" ?>
<?php require_once RUTA_APP."/Views/inc/navbar.php" ?>
  <div class="container">
        <div class="row p-5">
            <div class="col-md-8">
                <div class="card p-4">
                    <h3>Crear una cuenta nueva!</h3>
                    <div class="card-body">
                        <form action="<?php echo RUTA_URL;?>login/registrar" method="POST">
                            <div class="form-group">
                                <label for="">Nombres</label>
                                <input type="text" name="nombres" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <input type="text" name="apellidos"class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Usuario</label>
                                <input type="text" name="usuario"class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Contraseña</label>
                                <input type="text" name="contrasena"class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Confirmar Contraseña</label>
                                <input type="text" name="contrasena2" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Crear nueva cuenta</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  </div>

<?php require_once RUTA_APP."/Views/inc/footer.php" ?>