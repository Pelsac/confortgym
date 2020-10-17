<?php

    class Usuario extends  Controller{

        public function __construct()
        {
            //se crean una instancia del modelo
               //la funcion model es heredada de la clase controller
               
        //   $this->regresion = $this->model('usuario');
        }
        public function index()

        {
            
            $this->vista('home');
       }

      

    }


    ?>