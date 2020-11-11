
<?php
class Clientes extends  Controller{

    public function __construct()
    {
        $this->clienteModelo = $this->model('cliente');
    }
    public function index()

    {
        session_start();
      
        if($_SESSION['tipo_usuario'] == 1){
           
            $clientes = $this->clienteModelo->obtenerClientes();
        $datos = [
            'titulo'=>'Listado de clientes',
            'clientes'=>$clientes
        ];
        
        $this->vista('cliente/index',$datos);
        }else{
            redirecionar('home');
        }
        
    }

    public function agregar(){
       session_start();
       if($_SESSION['tipo_usuario'] == 1){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos=[
                'titulo'=>"Agregar nuevo cliente",
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
            $datos=["titulo"=>"Agregar nuevo cliente"];
          $this->vista('cliente/agregar',$datos);
        }
    }else{
        redirecionar('home');
    }
    }

    public function editar($id){
        session_start();
        if($_SESSION['tipo_usuario'] == 1){
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
        
        }else{
            redirecionar('home');
        }
    }


    public function eliminar($id){
        session_start();
        if($_SESSION['tipo_usuario'] == 1){
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
    else{
        redirecionar('home');
    }

    }

}

?>