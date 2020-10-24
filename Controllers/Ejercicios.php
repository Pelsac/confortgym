<?php


class Ejercicios extends  Controller{

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
            'titulo'=>'Listado de ejercicios',
            'rutinas'=>$rutinas,
            'niveles'=>$niveles
        ];
        $this->vista('Ejercicios/index',$datos);
   }


   public function agregar(){



   }

  

}


?>