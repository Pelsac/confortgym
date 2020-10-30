<?php

    class Sesiones extends  Controller{

        public function __construct()
        {
        $this->clienteModelo = $this->model('cliente');
        $this->SesionModelo = $this->model('Sesion');
        $this->EntrenadoresModelo=$this->model('Entrenador');
        $this->RutinaModelo=$this->model('Rutina');
        }
        public function index()
        {
            session_start();
            $categorias=$this->SesionModelo->obtenerSesiones();
            $entrenadores=$this->EntrenadoresModelo->obtenerEntrenadores();
            $rutinas=$this->RutinaModelo->obtenerRutinas();
           
            $datos=[
                'titulo'=>'Listado de Sesiones de entrenamiento',
                'entrenadores'=>$entrenadores,
                'sesiones'=>$sesiones,
                'rutinas'=>$rutinas,
            ];
            $this->vista('Sesiones/index',$datos);
       }

       public function agregar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

        }
       }
    }


    
?>