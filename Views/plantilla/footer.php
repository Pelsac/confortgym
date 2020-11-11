<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer>
  <input type="hidden" name="" id="ruta_url" value="<?php echo RUTA_URL ?>">
<!-- ./wrapper -->
</div>
<!-- REQUIRED SCRIPTS -->

<!-- AdminLTE App -->

<!-- jQuery -->
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script> 
<script src="<?php echo RUTA_URL?>assets/js/adminlte.min.js"></script> 
<script src="<?php echo RUTA_URL?>assets/js/bs-custom-file-input.min.js"></script>
<script src="<?php echo RUTA_URL?>assets/js/select2.full.min.js"></script>
<script src="<?php echo RUTA_URL?>assets/js/notificacion.js"></script>
<script src="<?php echo RUTA_URL?>assets/dataTables/datatables.min.js"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
<script>

$(document).ready(function () {
  bsCustomFileInput.init();
  $(document).ready(function() {
    $('#table').DataTable({
        pageLength:5,
        lengthMenu:[5,10,25,50],
        language:{
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }}
    });
} );


});

$('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
  theme: 'bootstrap4'
})
 


 
</script>
</body>
</html>