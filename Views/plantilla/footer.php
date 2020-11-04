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


});

$('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
  theme: 'bootstrap4'
})
 


 
</script>
</body>
</html>