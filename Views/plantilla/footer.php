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
<script src="<?php echo RUTA_URL?>Assets/js/jquery.min.js"></script>
<script src="<?php echo RUTA_URL?>Assets/js/bootstrap.min.js"></script>
<script src="<?php echo RUTA_URL?>Assets/js/adminlte.min.js"></script> 
<script src="<?php echo RUTA_URL?>Assets/js/bs-custom-file-input.min.js"></script>
<script src="<?php echo RUTA_URL?>Assets/js/select2.full.min.js"></script>
<script src="<?php echo RUTA_URL?>Assets/js/notificacion.js"></script>
<script src="<?php echo RUTA_URL?>Assets/DataTables/datatables.min.js"></script>

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