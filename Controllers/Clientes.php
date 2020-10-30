
<?php
class Clientes extends  Controller{

    public function __construct()
    {
        $this->clienteModelo = $this->model('cliente');
    }
    public function index()

    {
        session_start();
      
        if($_SESSION['tipo_usuario'] == 2){
           
            $clientes = $this->clienteModelo->obtenerClientes();
        $datos = [
            'titulo'=>'Listado de clientes',
            'clientes'=>$clientes
        ];
        
        $this->vista('Cliente/index',$datos);
        }else{
            redirecionar('home');
        }
        
    }

    public function agregar(){
       
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos=[
                'titulo'=>"agregar nuevo cliente",
                'nombres'=>trim($_POST['nombres']),
                'apellidos'=>trim($_POST['apellidos']),
                'fecha'=>trim($_POST['fecha']),
                'edad'=> calcularedad($_POST['fecha']),
                'genero'=>$_POST['genero'],
                'cod'=>$_POST['codigo']
            ];
           
                    if($this->clienteModelo->agregarCliente($datos)){
                        redirecionar('clientes');
                     }else{
                         die('algo salio mal');
                     }

        }else{
        
          $this->vista('cliente/agregar');
        }
    }

    public function editar($id){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $datos=[
                    'id'=>$id,
                    'nombres'=>trim($_POST['nombres']),
                    'apellidos'=>trim($_POST['apellidos']),
                    'fecha'=>trim($_POST['fecha']),
                    'edad'=> calcularedad($_POST['fecha']),
                    'genero'=>$_POST['genero'],
                    'cod'=>$_POST['codigo']
                ];
    
          
               if($this->clienteModelo->actualizarCliente($datos)){
                   redirecionar('clientes');
                }else{
                    die('algo salio mal');
                }
    
            }else{
                $cliente = $this->clienteModelo->obtenerClienteid($id);
                $datos = [
                    'id'=>$cliente->id,
                    'nombres'=>$cliente->nombres,
                    'apellidos'=>$cliente->apellidos,
                    'fecha'=>$cliente->fecha_nacimiento,
                    'edad'=>$cliente->edad,
                    'genero'=>$cliente->genero,
                    'cod'=>$cliente->cod_ingreso
                ];
    
    
                
              $this->vista('cliente/editar',$datos);
            }
        
        
    }


    public function eliminar($id){
        $cliente = $this->clienteModelo->obtenerClienteid($id);
            $datos = [
              
                'id'=>$cliente->id,
                'nombres'=>$cliente->nombres,
                'apellidos'=>$cliente->apellidos,
                'fecha'=>$cliente->fecha_nacimiento,
                'edad'=>$cliente->edad,
                'genero'=>$cliente->genero,
                'cod'=>$cliente->cod_ingreso
            ];
           if($this->clienteModelo->borrarCliente($datos['id'])){
               redirecionar('clientes');
            }else{
                die('algo salio mal');
            }
   
            $this->vista('cliente/editar',$datos);
        
        
    }




}

?>