
<?php require_once RUTA_APP."/views/plantilla/header.php";?>
<?php require_once RUTA_APP."/views/plantilla/navbar.php";?>
<?php require_once RUTA_APP."/views/plantilla/sidebar.php";?>
<div class="content-wrapper">
 <section class="content">
<?php require_once RUTA_APP."/views/plantilla/content-header.php";?>
      <div class="container-fluid">
    <!--  aqui va el diseño !-->
        <div class="row">
            <div class="col-md-3 mt-3">
            <a type="button" href="<?php echo RUTA_URL;?>clientes/agregar"class="btn btn-success" >
                  Agregar cliente
            </a>
          </div>
          </div>
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label for="">Limite de ingresos</label>
                <input type="text" class="form-control" id="ingresos">
                
                </div>
                <div class="form-group">
                <button class="btn btn-primary" id="agrega">Establecer</button>
                </div>
            </div>
            <div class="col-md-6">
            <h3 id="limite"></h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mt-3">
            <div class="card">
                    <div class="card-body table-responsive"style="height:400px;">
                    <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>fecha Nacimiento</th>
                            <th>edad</th>
                            <th>Genero</th>
                            <th>Codigo ingreso</th>
                            <th>En rutina</th>
                            <th>Usuario</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody id="clientes">
                    
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
            </div>
            
        </div>
      </div>
      
 </section>
</div>
<?php require_once RUTA_APP."/views/plantilla/footer.php" ?>
<script src="<?php echo RUTA_URL?>assets/ajax/clientes.js"></script> 
<script >
 var ruta =  $("#ruta").val();
$('#table1').DataTable({
    "ajax":ruta+"WbClientes/getClientes"
});
</script> 
