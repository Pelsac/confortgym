<?php

    class Usuarios extends  Controller{

        public function __construct()
        {
        
        $this->usuarioModelo = $this->model('Usuario');
        
        $this->rolesModelo = $this->model('Rol');
        }
        public function index()

        {
            session_start();
            $usuarios=$this->usuarioModelo->obtenerUsuarios();
           
            $datos=[
                'titulo'=>'Listado de usuarios',
                'usuarios'=>$usuarios,
                
            ];
            $this->vista('usuario/index',$datos);
       }


       public function agregar(){
           session_start();
        $roles = $this->rolesModelo->obtenerRoles();
        $errors = [];
           if($_SERVER['REQUEST_METHOD']=='POST'){
         
            $pass = trim($_POST['con_password']);
            $fecha = new DateTime();
            $datos = [
                'titulo'=>'Agregar nuevo usuario',
                'nombre' => trim($_POST['alias']),
                'password' => trim($_POST['password']),
                'correo' => trim($_POST['correo']),
                'token' => generateToken(),
                'fecha' => $fecha->format('y-m-d H:i:s'),
                'activo' => 1,
                'id_rol' => trim($_POST['id_rol']),
               
            ];

            if (isNull($datos, $pass)) {
                $errors[] = "Debe llenar todos los campos";
            }
            if (!isEmail($datos['correo'])) {
                $errors[] = "Direccion de correo invalida";
            }
            if (!validPassword($datos['password'], $pass)) {
                $errors[] = "Las contraseñas no coinciden";
            }
            if (count($errors) == 0) {
                $datos['password'] = hashPassword(trim($_POST['password']));
               
                if ( $this->usuarioModelo->agregarUsuario($datos)) {
                    redirecionar('usuarios');
                } else {
                    $datos=[
                        'titulo'=>'Agregar nuevo usuario',
                        'roles'=>$roles,
                        'nombre' =>'' ,
                         'password' => '' ,
                         'correo' => '' ,
                         'token' => '' ,
                         'fecha' => '',
                         'activo' => '',
                         'id_rol' => '' 
         
                    ];
                    $this->vista('Usuario/agregar',$datos,$errors);

                }

            }else {
                $datos=[
                    'titulo'=>'Agregar nuevo usuario',
                    'roles'=>$roles,
                    'nombre' =>'' ,
                     'password' => '' ,
                     'correo' => '' ,
                     'token' => '' ,
                     'fecha' => '',
                     'activo' => '',
                     'id_rol' => '' 
     
                ];
                $this->vista('Usuario/agregar',$datos,$errors);
            }

           
       }else{
           $datos=[
               'titulo'=>'Agregar nuevo usuario',
               'roles'=>$roles,
               'nombre' =>'' ,
                'password' => '' ,
                'correo' => '' ,
                'token' => '' ,
                'fecha' => '',
                'activo' => '',
                'id_rol' => '' 

           ];
        $this->vista('usuario/agregar',$datos,$errors);
       }

      
    }


    function editar(){
        session_start();
        $datos=[
            'titulo'=>'Actualizar contraseña'
        ];
        $this->vista('usuario/editar',$datos);
    }


    function eliminar($id){
        session_start();
        if($_SESSION['tipo_usuario'] == 1){
        
           if($this->usuarioModelo->eliminarUsuario($id)){
               redirecionar('usuarios');
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