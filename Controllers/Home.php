<?php

     class Home extends Controller{

        function __construct(){
            
        }
         public function index()
         {
            session_start();
            if($_SESSION['id_usuario']){
            
                $this->vista("Cliente/index");
               
            }else{
                redirecionar('login');
            }
          
         }

         

      
     }

?>