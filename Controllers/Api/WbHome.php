<?php
class WbHome extends Controller{

    function __construct(){
        $this->rutinasModelo= $this->model('Rutina');
        $this->sesionModelo= $this->model('Sesion');
        $this->usuarioModelo= $this->model('Usuario');
        $this->NotModelo= $this->model('Notificacion');
       
    }
    function index(){
    
    }

    public function getRutinas(){
        $rutinas = $this->rutinasModelo->obtenerRutinas();
        echo json_encode($rutinas);
     }


     public function programarRutina(){
         session_start();
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $datos=[
                'asistencia'=>$_POST['asistencia'],
                'fecha'=>$_POST['fecha'],
                'hora'=>$_POST['hora'],
                'activo'=>"En espera"               
            ];
           if($this->sesionModelo->agregarSesion($datos)){
               $id=$this->sesionModelo->obtenerid(); 
               $id_cliente=$_SESSION['identificacion'];
               $id_usuario=$_SESSION['id_usuario'];
               //enviar notificacion al los administradores
               $fecha = new DateTime();
              $useradmin = $this->usuarioModelo->getValores("id","id_rol",1);
        
               $notificacion=[
                   "id1"=>$id_usuario,
                   "id2"=>$useradmin,
                "mensaje"=>"El cliente ". $_SESSION['nombres']." ha programado una nueva rutina,<br> por favor verifica su estado.",
                "fecha"=>$fecha->format('y-m-d H:i:s')
            ];

     
               if($this->sesionModelo->programarSesion($id->id_sesion,$id_cliente)){
                    
                if( $this->NotModelo->enviar($notificacion)){
                        echo 'La rutina ha sido programada con exito';
                        }else{
                            echo "error";
                        }
               }else{

                echo 'error';
               }
              
           }else{
               echo 'la Rutina no pudo ser programada';
           }
        }
           
         
     }

     public function obtenerSesiones(){
      $sesiones = $this->sesionModelo->obtenerSesiones();
      echo json_encode($sesiones);
     }

     public function buscar(){
         $nombre = $_POST['search'];
        $rutinas = $this->rutinasModelo->buscar($nombre);
        echo json_encode($rutinas);
     }

     public function getsesiones(){
         $id = $_POST['id_user'];
    
        $sesione = $this->sesionModelo->obtenerSesionesclientes($id);
        echo json_encode($sesione);
     }

     public function cancelarsesion(){
        session_start();
        $id=$this->sesionModelo->obtenerid(); 
        $id_cliente=$_SESSION['identificacion'];
        $id_usuario=$_SESSION['id_usuario'];
        //enviar notificacion al los administradores
        $fecha = new DateTime();
       $useradmin = $this->usuarioModelo->getValores("id","id_rol",1);
 
        $notificacion=[
            "id1"=>$id_usuario,
            "id2"=>$useradmin,
         "mensaje"=>"El cliente ". $_SESSION['nombres']." ha cancelado la rutina programada en la fecha",
         "fecha"=>$fecha->format('y-m-d H:i:s')
     ];
        $id = $_POST['id'];
        $estado ="Cancelado";
       
        if($this->sesionModelo->aprobarSesion($id,$estado)){
            if( $this->NotModelo->enviar($notificacion)){
                echo 'La rutina ha sido cancelada';
                }else{
                    echo "error";
                }
        }else{
            echo 'la Rutina no pudo ser cancelada';
        }
    }

    
}