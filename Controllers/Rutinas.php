<?php


class Rutinas extends  Controller{

    public function __construct()
    {
    
    $this->RutinaModelo = $this->model('Rutina');
    $this->NivelModelo = $this->model('Nivel');
    $this->ejercicioModelo = $this->model('Ejercicio');
    }
    public function index()

    { session_start();
        if($_SESSION['tipo_usuario'] == 1){
        $rutinas = $this->RutinaModelo->obtenerRutinas();
        $niveles = $this->NivelModelo->obtenerNiveles();
        $ejercicios =$this->ejercicioModelo->obtenerEjercicios();
        $datos=[
            'titulo'=>'Listado de rutinas',
            'rutinas'=>$rutinas,
            'niveles'=>$niveles,
            'ejercicios'=>$ejercicios
        ];
        $this->vista('Rutina/index',$datos);
   }
   else{
       redirecionar('home');
   }
}


   public function agregar(){
    session_start();
    if($_SESSION['tipo_usuario'] == 1){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $foto =$_FILES['banner']['name'];
        $ruta= $_FILES['banner']['tmp_name'];
        $destino=RUTA_APP."/Assets/img/banner/".$foto;
        copy($ruta,$destino);
        $datos=[
            'nombre'=>trim($_POST['nombre']),
            'descri'=>trim($_POST['descripcion']),
            'descripcion_c'=>trim($_POST['descripcion_corta']),
            'banner'=>"/Assets/img/banner/".$foto,
            'frase'=>trim($_POST['frase']),
            'nivel'=>trim($_POST['nivel']),
            'ejercicios'=> $_POST['ejercicios'],
        ];
  
       if($this->RutinaModelo->agregarRutinas($datos)){
        $id =$this->RutinaModelo->obtenerid();
           if($this->RutinaModelo->asignarEjercicios($id->codigo,$datos['ejercicios'])){
            redirecionar('rutinas');
           }
          
         }else{
             die('algo salio mal');
         }

     }else{
     
       $this->vista('rutina/index');
     }
   }else{
    redirecionar('home');
}}

   public function detalles($id){
       session_start();
       if($_SESSION['tipo_usuario'] == 1){
    $rutinas = $this->RutinaModelo->obtenerDetalles($id);
    $fila = $this->RutinaModelo->getValor("nombre_rutina","codigo",$id);
    $des = $this->RutinaModelo->getValor("descripcion_rutina","codigo",$id);
    $datos = [
        'titulo'=>'Informacion de la rutina',
        'nombre'=>$fila->nombre_rutina,
        'descripcion'=>$des->descripcion_rutina,
        'rutinas'=>$rutinas
       
    ];
     $this->vista('Rutina/detalles',$datos);
    }else{
        redirecionar('home');
    }
   }
  
    public function eliminar($id){
        session_start();
        if($_SESSION['tipo_usuario'] == 1){
        
           if($this->RutinaModelo->borrarRutina($id)){
               redirecionar('rutinas');
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