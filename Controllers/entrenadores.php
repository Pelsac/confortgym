<?php
 class entrenadores extends Controller {
     
    public function __construct()
    {
       
//$this->clienteModelo = $this->model('cliente');
    }


    public function index(){
        $this->vista('Entrenador/index');
    }

 }