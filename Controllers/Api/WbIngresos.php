<?php 
    class WBIngresos extends Controller{


        function __construct(){
            $this->clienteModelo= $this->model('Cliente');
    
        
           
        }
        function index(){
        
        }
        public function registraringreso(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $codigo = trim($_POST['codigo']);
                 $estado ="si";
               
               $enRutina = $id = $this->clienteModelo->getValor("en_rutina","cod_ingreso",$codigo);
               if($enRutina->en_rutina == $estado){
                $id = $this->clienteModelo->getValor("id","cod_ingreso",$codigo);
                $cod= $id->id;
                $estado="no";
                if($this->clienteModelo->ingresar($cod,$estado)){
                    
                    echo json_encode("El cliente ha salido del establecimiento");
                }else{
                    echo json_encode("Ha ocurrido un error");
                }

               }else{
                 $id = $this->clienteModelo->getValor("id","cod_ingreso",$codigo);
                 $cod= $id->id;
                if($this->clienteModelo->ingresar($cod,$estado)){
                    echo json_encode("El cliente ha entrado al establecimiento");
                }else{
                    echo json_encode("Ha ocurrido un error no se pudo registrar el ingreso");
                }
            }
            }
           
        }
        public function obteneringresos(){
          $numero_ingresos =  $this->clienteModelo->ingresos();
          echo json_encode($numero_ingresos);
        }
    }





?>