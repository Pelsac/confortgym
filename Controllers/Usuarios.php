<?php

    class Usuarios extends  Controller{

        public function __construct()
        {
        
        $this->usuarioModelo = $this->model('Usuario');
        }
        public function index()

        {
            $usuarios=$this->usuarioModelo->obtenerUsuarios();
            $datos=[
                'titulo'=>'Listado de usuarios',
                'usuarios'=>$usuarios
            ];
            $this->vista('Usuario/index',$datos);
       }

      

    }


    ?>