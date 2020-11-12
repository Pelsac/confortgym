<?php

     class Home extends Controller{

        function __construct(){
            $this->rutinasModelo= $this->model('Rutina');
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

        
    
         public function actualizardatosU(){
         
            session_start();
           $idusuario = $_SESSION['id_usuario'];
           $id_cliente = $_SESSION['identificacion'];
            $this->vista('actDatosU');


         }
         
         public function actualizardatos($id_cliente){
           
           
            session_start();
            $idusuario = $_SESSION['id_usuario'];
            $id_cliente = $_SESSION['identificacion'];
            if($_SESSION['tipo_usuario']==2){
                if($_SERVER['REQUEST_METHOD']=='POST'){
                    $datos=[
                        'id'=>$idusuario,
                        'nombres'=>trim($_POST['nombres']),
                        'apellidos'=>trim($_POST['apellidos']),
                        'fecha'=>trim($_POST['fecha']),
                        'edad'=> calcularedad($_POST['fecha']),
                        'genero'=>$_POST['genero']
                       
                    ];
        
              
                   if($this->rutinasModelo->actualizarCliente($datos)){
                       redirecionar('home');
                    }else{
                        die('algo salio mal');
                    }
        
                }else{
                    $cliente = $this->rutinasModelo->obtenerClienteid($id_cliente);
                    $datos = [
                        
                        'nombres'=>$cliente->nombres,
                        'apellidos'=>$cliente->apellidos,
                        'fecha'=>$cliente->fecha_nacimiento,
                        'edad'=>$cliente->edad,
                        'genero'=>$cliente->genero
                        
                    ];
        
        
                    
                    $this->vista('actualizar',$datos);
                }
            
            }else{
                redirecionar('home');
            }
        }
          
           


         
     }

?>