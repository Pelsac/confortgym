<?php

     class Home extends Controller{

        function __construct(){
            $this->rutinasModelo= $this->model('Rutina');
        }

         public function index()
         {
            session_start();
            if($_SESSION['id_usuario']){
                if(isAjax()){
                    $rutinas = $this->rutinasModelo->obtenerRutinas();
                    echo json_encode($rutinas);
                }else{
                    $this->vista('Home');
                }
         
              
            }else{
                redirecionar('login');
            }
          
         }

        

    
         
         

      
     }

?>