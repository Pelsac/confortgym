
<?php require_once RUTA_APP."/views/inc/header.php";?>
<?php require_once RUTA_APP."/views/inc/navbar.php";?>
<div class="container mt-5 p-5">
    <div class="row">
            <div class="col-md-12 col-gl-12">
            
                 <h3>Consulta el estado de las sesiones programadas</h3>
            </div>
            <div class="col-md-12">
            <div class="card">
                                <div class="card-body table-responsive" >
                                  <table class="table table-hover " id="table">
                                      <thead>
                                        <tr>
                                          <th>Nombre</th>
                                          <th>Estado</th>
                                          <th>Fecha</th>
                                          <th>Hora establecida</th>
                                          <th>Operaciones</th>
                                        </tr>
                                      </thead>
                                  <tbody id="list-sesion">
                                  </tbody>
                                  </table>

                           </div>
</div>

            </div>
    </div>
</div>
<?php require_once RUTA_APP."/views/inc/footer.php" ?>
<script src="<?php echo RUTA_URL ?>/assets/alertifyjs/alertify.min.js"></script>
<script src="<?php echo RUTA_URL ?>/assets/js/sesiones.js"></script>