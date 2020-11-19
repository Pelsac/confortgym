
<?php
class WbClientes extends Controller{
    function __construct(){

        $this->clienteModelo= $this->model('Cliente');
    }
    function index(){
    
    }
    public function getClientes(){
        $clientes = $this->clienteModelo->obtenerClientes();
        echo json_encode($clientes);
    }
}

?>