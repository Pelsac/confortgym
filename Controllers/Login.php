<?php

class Login extends Controller{

        
    public function index()
    {
     
       $this->vista('Usuario/login');
    }

    public function registrar(){
        
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $datos = [
                'nombres'=> trim($_POST['nombres']),
                'apellidos'=>trim($_POST['apellidos']),
                 'usuario'=>trim($_POST['usuario']),
                 'email'=>trim($_POST['email']),
                 'contraseña'=>trim($_POST['contrasena']),
                 'rol'=>'cliente'
            ];
            print_r('<pre>');
            print_r($datos);
            print_r ('</pre>');
        }
   }

 
}

?>