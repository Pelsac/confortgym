<?php require_once RUTA_APP."/views/inc/header.php";?>
<?php require_once RUTA_APP."/views/inc/navbar.php";?>

    

      <div class="container">
     
        <div class="row p-4 p-md-5">
                <div class="col-md-6 mt-5">
                <h1 class="text-uppercase">Te damos la bienvenida:</h1> <h2 class="text-uppercase"><?php echo $_SESSION['nombres']." ". $_SESSION['apellidos']?></h2>
                </div>
                <div class="col-md-6 mt-5">
                <img  class="card-img-top"src="./Assets/img/ilustraciones/fitness.svg" alt="" height="250" width="300">
                </div> 
            </div>
      
            <div class="row mt-3">
               <div class="col-md-12">
                    <div class="row">
                            <div class="col-md-6 ">
                          
                              <form >
                                  <div class="input-group">
                                    <input class="form-control form-control-navbar" type="search" placeholder="Search" id="search"aria-label="Search">
                                    <div class="input-group-append">
                                      <button class="btn btn-secondary" type="submit">
                                        <i class="fas fa-search"></i>
                                      </button>
                                    </div>
                                  </div>
                              </form>
                
                              </div>
                              <div class="col-md-3 mt-1">
                                 
                                  <button class="btn btn-flat btn-block btn-outline-primary" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-calendar-alt"></i> Programar Sesion</button>
                                  
                              </div>
                              <div class="col-md-3">
                                <h5>Usuarios en rutinas</h5>
                                <span ><i class="fas fa-users fa-2x"></i>  <span id="clientes" class="fa-2x"></span></span>
                              </div>
                             
                         </div>
             <hr>
                    </div>
            </div>
    
            <div class="row">
                  
                   
                      <div class="col-md-6" id="list-rut">
                      
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <div class="area">
                                  <div class="card" >
                                    <div class="card-header bg-primary text-white">
                                      Sesiones Programadas
                                        </div>
                                      <div class="card-body">
                                        <div id="calendar"></div>
                                      </div>
                                  </div>
                          </div>
                          
                      </div>
                            
        </div>
      
</div>   
<?php require_once RUTA_APP."/views/nuevaSesion.modal.php" ?>
           </div>
           <footer class="align-content-center m-auto" style="position:relative">
             <p class="text-center text-white">hola</p>
           </footer>
         
        
        



<?php require_once RUTA_APP."/views/inc/footer.php" ?>
<script src="<?php echo RUTA_URL ?>/assets/alertifyjs/alertify.min.js"></script>
<script src="<?php echo RUTA_URL?>assets/js/eventos.js"></script>
<script src="<?php echo RUTA_URL ?>/assets/js/index.js"></script>
