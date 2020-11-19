
<?php
class Clientes extends  Controller{

    public function __construct()
    {
        $this->clienteModelo = $this->model('Cliente');
        $this->usuarioModelo = $this->model('Usuario');
    }
    public function index()

    {
        session_start();
      
        if($_SESSION['tipo_usuario'] == 1){
           
            $clientes = $this->clienteModelo->obtenerClientes();
            
        $datos = [
            'titulo'=>'Listado de clientes',
            'clientes'=>$clientes,
            
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
            $cliente = $this->clienteModelo->obteneridUsuario();
            $datos=[
                'titulo'=>"Agregar nuevo cliente",
                'nombres'=>trim($_POST['nombres']),
                'apellidos'=>trim($_POST['apellidos']),
                'fecha'=>trim($_POST['fecha']),
                'edad'=> calcularedad($_POST['fecha']),
                'genero'=>$_POST['genero'],
                'cod'=>$_POST['codigo'],
                'cod_usuario'=>$cliente->id
              
            ];
            
                    if($this->clienteModelo->agregarCliente($datos)){
                        redirecionar('clientes');
                     }else{
                         die('algo salio mal');
                     }

        }else{
            $usuarios = $this->usuarioModelo->obtenerUsuarios();
            $datos=["titulo"=>"Agregar nuevo cliente",
            'usuarios'=>$usuarios];
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


    public function eliminar(){
        session_start();
        if($_SESSION['tipo_usuario'] == 1){

           $id = $_POST['id'];
           
           $row = $this->clienteModelo->obtenerClienteid($id);
           $id_user = $row->cod_usuario;

           if( $this->usuarioModelo->eliminarUsuario($id_user)){
               redirecionar('clientes');
            }else{
                die('algo salio mal');
            }

        
    }
    else{
        redirecionar('home');
    }

    }

}

?>