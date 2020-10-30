<?php require_once RUTA_APP."/Views/inc/header.php";?>
<?php require_once RUTA_APP."/Views/inc/navbar.php";?>

    

      <div class="container">
        <div class="row p-4 p-md-5">
        <div class="col-md-6">
        <h1 class="text-uppercase">Te damos la bienvenda <?php echo $_SESSION['nombre']?></h1>
        </div>
        <div class="col-md-6">
        <img  class="card-img-top"src="./Assets/img/ilustraciones/fitness.svg" alt="" height="250" width="300">
        </div> 
</div>
        <div class="row">
            <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <h3>Explora las rutinas de entrenamiento</h3>
             <input type="hidden" name="" id="ruta" value="<?php echo RUTA_URL ?>">
             <form >
      <div class="input-group">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-secondary" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
           
            </div>
                <div class="col-md-4">
                    <button class="btn btn-flat btn-outline-primary">Nueva rutina</button>
                    <button class="btn btn-flat btn-outline-primary">Programar Sesion</button>
                    
                </div>
               
            </div>
             <hr>
            </div>
        <div class="col-md-8 "id="list-rut">
            
        </div>
        <div class="col-md-4">
        <div class="row">
                <div class="col-md-12">
                   <h3>Rutinas mas usadas</h3>
                </div>
                <div class="card">
                  <div class="card-header bg-info">

                  </div>
                  <div class="card-body">
                   
                  </div>
                </div>

            </div>
            <div class="row">
            <div class="col-md-12">
                   <h3>alcanza mejor rendimiento</h3>
            </div>
        </div>

</div>
<?php require_once RUTA_APP."/Views/inc/footer.php" ?>
<script src="<?php echo RUTA_URL ?>/Assets/js/index.js"></script>