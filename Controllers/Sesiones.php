<?php

    class Sesiones extends  Controller{

        public function __construct()
        {
       
        $this->SesionModelo = $this->model('Sesion');
   
       
        }
        public function index()
        {
            session_start();
            $sesiones=$this->SesionModelo->obtenerSesiones();          
            $datos=[
                'titulo'=>'Listado de Sesiones de entrenamiento',               
                'sesiones'=>$sesiones,
            ];
            $this->vista('Sesiones/index',$datos);
       }

    }


    
?>