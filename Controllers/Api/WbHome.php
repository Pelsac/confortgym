<?php
class WbHome extends Controller{

    function __construct(){
        $this->rutinasModelo= $this->model('Rutina');
    }
    function index(){
    
    }

    public function getRutinas(){
        $rutinas = $this->rutinasModelo->obtenerRutinas();
        echo json_encode($rutinas);
     }
}