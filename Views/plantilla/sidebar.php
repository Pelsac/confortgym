<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      
           
      <span class="brand-text font-weight-light">Confort Gym</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
 
        <div class="image">
         <i class="fas fa-user-graduate text-white "></i>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php   echo $_SESSION['alias']; ?></a>
        </div>
      
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
          <li class="nav-item">
            <a href="<?php echo RUTA_URL ?>Sesiones" class="nav-link">
              <i class="nav-icon fas fa-calendar-check"></i>
              <p>
               Rutinas Programadas
              
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo RUTA_URL ?>clientes" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Clientes
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo RUTA_URL ?>usuarios" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Usuarios
                
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="<?php echo RUTA_URL ?>rutinas" class="nav-link">
              <i class="nav-icon fas fa-feather"></i>
              <p>
                Rutinas
                
              </p>
            </a>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              ejercicios
                
                <i class="fas fa-angle-left right"></i>
             
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo RUTA_URL ?>ejercicios" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de ejercicio</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo RUTA_URL ?>categorias" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>categorias</p>
                </a>
              </li>
            </ul>
          </li>
     
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>