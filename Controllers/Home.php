<?php

     class Home extends Controller{

        function __construct(){
            $this->rutinasModelo= $this->model('Rutina');
        }

         public function index()
         {
            session_start();
            if($_SESSION['id_usuario']){
               
                    $this->vista('home');
                
         
              
            }else{
                redirecionar('login');
            }
          
         }

         public function sesiones(){
            session_start();
            if($_SESSION['id_usuario']){
                $this->vista('sesion');
         
              
            }else{
                redirecionar('login');
            }
        
         }

         public function actualizardatos(){
         
            session_start();
           $idusuario = $_SESSION['id_usuario'];
           $id_cliente = $_SESSION['identificacion'];
            $this->vista('actualizar');


         }
     }

?>