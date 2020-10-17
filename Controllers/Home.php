<?php

     class Home extends Controller{

        
         public function index()
         {
          
            $this->vista('Usuario/login');
         }

         public function crear_usuario(){
            $this->vista('Usuario/insert');
        }

      
     }

?>