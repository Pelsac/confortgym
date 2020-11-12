<?php

     class Home extends Controller{

        function __construct(){
            $this->rutinasModelo= $this->model('Rutina');
            $this->clienteModelo = $this->model('cliente');
            $this->usuarioModelo = $this->model('Usuario');
            
        }

         public function index()
         {
            session_start();
            if($_SESSION['id_usuario']){
               
                    $this->vista('home');
                
         
              
            }else{
                redirecionar('login');
            }
          
         }

         public function sesiones(){
            session_start();
            if($_SESSION['id_usuario']){
                $this->vista('sesion');
         
              
            }else{
                redirecionar('login');
            }
        

         }


         public function actualizardatosU($idusuario){
         
            session_start();
           $idusuario = $_SESSION['identificacion'];
           if($_SESSION['tipo_usuario']==2){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $datos=[
                    'id'=>$idusuario,
                    'alias'=>trim($_POST['alias']),
                    'correo'=>trim($_POST['correo'])
                 
                ];
    
          
               if($this->usuarioModelo->actualizarUsuario($datos)){
                   redirecionar('home');
                }else{
                    die('algo salio mal');
                }
    
            }else{
                $usuario = $this->usuarioModelo->obtenerUsuarioid($idusuario);
                $datos = [
                    
                    'id'=>$usuario->id,
                    'alias'=>$usuario->alias,
                    'correo'=>$usuario->correo
                    
                ];
    
    
                
                $this->vista('actDatosU',$datos);
            }
        
        }else{
            redirecionar('home');
        }
      

         }

        
    
         
         
         public function actualizardatos($id_cliente){
           
           
            session_start();
           
            $id_cliente = $_SESSION['identificacion'];
            $cliente = $this->clienteModelo->obtenerClienteid($id_cliente);
            if($_SESSION['tipo_usuario']==2){
                if($_SERVER['REQUEST_METHOD']=='POST'){
                    $datos=[
                        'id'=>$id_cliente,
                        'nombres'=>trim($_POST['nombres']),
                        'apellidos'=>trim($_POST['apellidos']),
                        'fecha'=>trim($_POST['fecha']),
                        'edad'=> calcularedad($_POST['fecha']),
                        'genero'=>$_POST['genero'],
                        'cod'=>$cliente->cod_ingreso
                       
                    ];
        
              
                   if($this->clienteModelo->actualizarCliente($datos)){
                       redirecionar('home');
                    }else{
                        die('algo salio mal');
                    }
        
                }else{
                    
                    $datos = [
                        
                        'id'=>$cliente->id,
                        'cod'=>$cliente->cod_ingreso
                        
                    ];
        
        
                    
                    $this->vista('actualizar',$datos);
                }
            
            }else{
                redirecionar('home');
            }
        }
          
           


         
     }

?>