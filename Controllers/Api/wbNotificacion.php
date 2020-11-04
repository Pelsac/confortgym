<?php
class WbNotificacion extends Controller{

    function __construct(){
        $this->notModelo= $this->model('Notificacion');
    }
    function index(){
    
    }

     public function getNotificacion(){
         session_start();
        if($_SERVER['REQUEST_METHOD']=='POST'){
           if($this->notModelo->obtenerNotificaciones()){
            $notificacion =$this->notModelo->obtenerNotificaciones();
            echo json_encode($notificacion);
           }else{
               echo "no hay notificaciones nuevas";
           }
        
        }
           
         
     }

    
}
?>