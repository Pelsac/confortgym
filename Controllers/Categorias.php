<?php

    class Categorias extends  Controller{

        public function __construct()
        {
        
        $this->usuarioModelo = $this->model('Usuario');
        }
        public function index()

        {
            $usuarios=$this->usuarioModelo->obtenerUsuarios();
            $datos=[
                'titulo'=>'Listado de categorias',
                
                'usuarios'=>$usuarios
            ];
            $this->vista('Categorias/index',$datos);
       }

      

    }


    ?>