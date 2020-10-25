<?php
 class Entrenadores extends Controller {
     
    public function __construct()
    {
       
$this->entrenadorModelo = $this->model('entrenador');
    }


    public function index()

    {
        $entrenadores = $this->entrenadorModelo->obtenerEntrenadores();
        $datos = [
            'entrenadores'=>$entrenadores
        ];
        
        $this->vista('Entrenador/index',$datos);
    }
    public function agregar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos=[
                'identificacion'=>$_POST['identificacion'],
                'nombres'=>trim($_POST['nombres']),
                'apellidos'=>trim($_POST['apellidos']),
                'celular'=>$_POST['celular'],
                'fecha'=>trim($_POST['fecha']),
                'direccion'=> trim($_POST['direccion']),
                'correo'=>trim($_POST['correo']),
                'imagen'=>trim($_POST['imagen'])
            ];

      
           if($this->entrenadorModelo->agregarEntrenador($datos)){
               redirecionar('entrenadores');
            }else{
                die('algo salio mal');
            }

        }else{
        
          $this->vista('entrenador/agregar');
        }
       
    }

    public function editar($identificacion){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos=[
                
                'identificacion'=>$identificacion,
                'nombres'=>trim($_POST['nombres']),
                'apellidos'=>trim($_POST['apellidos']),
                'celular'=> $_POST['celular'],
                'fecha'=>trim($_POST['fecha']),
                'direccion'=> trim($_POST['direccion']),
                'correo'=>trim($_POST['correo']),
                'imagen'=>trim($_POST['correo'])
            ];

      
           if($this->entrenadorModelo->actualizarEntrenador($datos)){
               redirecionar('entrenadores');
            }else{
                die('algo salio mal');
            }

        }else{
            $entrenador = $this->entrenadorModelo->obtenerEntrenadorid($identificacion);
            $datos = [
                'identificacion'=>$entrenador->identificacion,
                'nombres'=>$entrenador->nombres,
                'apellidos'=>$entrenador->apellidos,
                'celular'=>$entrenador->celular,
                'fecha'=>$entrenador->fecha_nacimiento,
                'direccion'=>$entrenador->direccion,
                'correo'=>$entrenador->correo,
                'imagen'=>$entrenador->imagen
            ];


            
          $this->vista('entrenador/editar',$datos);
        }
    }


    public function eliminar($identificacion){
        $entrenador = $this->entrenadorModelo->obtenerEntrenadorid($identificacion);
            $datos = [
                'identificacion'=>$entrenador->identificacion,
                'nombres'=>$entrenador->nombres,
                'apellidos'=>$entrenador->apellidos,
                'celular'=>$entrenador->celular,
                'fecha'=>$entrenador->fecha_nacimiento,
                'direccion'=>$entrenador->direccion,
                'correo'=>$entrenador->correo,
                'imagen'=>$entrenador->imagen
            ];
           if($this->entrenadorModelo->borrarEntrenador($datos['identificacion'])){
               redirecionar('entrenadores');
            }else{
                die('algo salio mal');
            }
   
            $this->vista('entrenador/editar',$datos);
        
        
    }


 }
 ?>