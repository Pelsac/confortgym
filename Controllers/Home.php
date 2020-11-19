<?php

     class Home extends Controller{

        function __construct(){
            $this->rutinasModelo= $this->model('Rutina');
            $this->clienteModelo = $this->model('cliente');
            $this->usuarioModelo = $this->model('Usuario');
            
        }

         public function index()
         {
            session_set_cookie_params(0);
            session_start();
            if($_SESSION['id_usuario']){
               
                    $this->vista('home');
                
         
              
            }else{
                redirecionar('login');
            }
          
         }

        function productos(){
            session_start();
            $this->vista('productos');
        }
         public function sesiones(){
            session_start();
            if($_SESSION['id_usuario']){
                $this->vista('sesion');
         
              
            }else{
                redirecionar('login');
            }
        

         }
   
         public function perfil_de_usuario(){
            session_start();
            
            if($_SESSION['tipo_usuario']==2){
                $id=$_SESSION['identificacion'];

               $cliente = $this->clienteModelo->obtenerClienteid($id);
              $usuario = $this->usuarioModelo->obtenerUsuarioid($cliente->cod_usuario);
              
               $datos=['cliente'=>$cliente,
                        'usuario'=>$usuario];
                    $this->vista('editarperfil',$datos);
            }else{
                redirecionar('home');
            }
        }

            public function actualizar_datos(){
                session_start();
            
                if($_SESSION['tipo_usuario']==2){
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                        $id=$_SESSION['identificacion'];
                        
                        $datos=[
                                'id'=>$id,
                                'id1'=>$_SESSION['id_usuario'],
                                'nombres'=>trim($_POST['nombres']),
                                'apellidos'=>trim($_POST['apellidos']),
                                'fecha'=>trim($_POST['fecha']),
                                'edad'=>calcularedad($_POST['fecha']),
                                'genero'=>trim($_POST['genero']),
                                'correo'=>trim($_POST['correo']),
                                'alias'=>trim($_POST['alias']),
                                'cod'=>trim($_POST['cod'])];
                               

                        if($this->clienteModelo->actualizarCliente($datos)){
                            if( $this->usuarioModelo->actualizarUsuario($datos)){
                                $_SESSION['nombres'] = $datos['nombres'];
                                $_SESSION['apellidos']=$datos['apellidos'];
                                $_SESSION['alias'] = $datos['alias'];
                                    redirecionar('home');
                                }
                        }


                    }


                    else{
                    $id=$_SESSION['identificacion'];
                   $cliente = $this->clienteModelo->obtenerClienteid($id);
                  $usuario = $this->usuarioModelo->obtenerUsuarioid($cliente->cod_usuario);
                  
                   $datos=['cliente'=>$cliente,
                            'usuario'=>$usuario];
                        $this->vista('actualizar',$datos);
                    }
                }else{
                    redirecionar('home');
                }
            }
        public function detalles($id){
            session_start();
            $rutinas = $this->rutinasModelo->obtenerDetalles($id);
            $fila = $this->rutinasModelo->getValor("nombre_rutina","codigo",$id);
            $des = $this->rutinasModelo->getValor("descripcion_corta","codigo",$id);
            $banner = $this->rutinasModelo->getValor("banner","codigo",$id);
            $datos = [
                'titulo'=>'Informacion de la rutina',
                'nombre'=>$fila->nombre_rutina,
                'banner'=>$banner->banner,
                'descripcion'=>$des->descripcion_corta,
                'rutinas'=>$rutinas
               
            ];
            
            $this->vista('detallesderutina',$datos);
        }
          public function actualizar_clave(){
              session_start();

              if($_SESSION['tipo_usuario']==2){
                if($_SERVER['REQUEST_METHOD']=='POST'){ 
                        $datos=[
                                'id'=>$_SESSION['id_usuario'],
                                'password'=>trim($_POST['clave1']),
                                'password1'=>trim($_POST['clave2']),
                                ];

                                if(validPassword($datos['password'],$datos['password1'])){
                                    $pass_has1 = hashPassword($datos['password']);
                                    if($this->usuarioModelo->cambiaPasswordC($datos['id'],$pass_has1)){
                                        redirecionar('home/perfil_de_usuario');
                                    }else{

                                        $this->vista('cambiarpassword');
                                    }
                                }else{
                                   $error[]="las contraseñas no coinciden";
                                    $this->vista('cambiarpassword',[],$error);
                                }

                }else{
                    $this->vista('cambiarpassword');
                }
          }else{
                    redirecionar('home');
                }
            
            }
           
        public function datospersonales(){
            session_start();
            
            if($_SESSION['tipo_usuario']==2){
                    $this->vista('datospersonales');
            }else{
                redirecionar('home');
            }
        }

         
     }

?>