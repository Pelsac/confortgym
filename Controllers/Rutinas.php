<?php


class Rutinas extends  Controller{

    public function __construct()
    {
    
    $this->RutinaModelo = $this->model('Rutina');
    $this->NivelModelo = $this->model('Nivel');
    }
    public function index()

    {
        session_start();
        $rutinas = $this->RutinaModelo->obtenerRutinas();
        $niveles = $this->NivelModelo->obtenerNiveles();
        $datos=[
            'titulo'=>'Listado de rutinas',
            'rutinas'=>$rutinas,
            'niveles'=>$niveles
        ];
        $this->vista('Rutina/index',$datos);
   }


   public function agregar(){



   }

  

}


?>