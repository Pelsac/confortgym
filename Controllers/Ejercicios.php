<?php


class Ejercicios extends  Controller{

    public function __construct()
    {
    
    $this->ejercicioModelo = $this->model('Ejercicio');
    $this->categoriaModelo = $this->model('Categoria');

    }
    public function index()

    {
        session_start();
        $categorias = $this->categoriaModelo->obtenerCategorias();
        $ejercicios = $this->ejercicioModelo->obtenerEjercicios();
      

        $datos=[
            'titulo'=>'Listado de ejercicios',
            'categorias'=>$categorias,
            "ejercicios"=>$ejercicios
           
        ];
       
         $this->vista('ejercicios/index',$datos);
   }


   public function agregar(){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $foto =$_FILES['avatar']['name'];
        $ruta= $_FILES['avatar']['tmp_name'];
        $destino=RUTA_APP."/Assets/img/ejercicios/".$foto;
        copy($ruta,$destino);
        $datos=[
            'nombre'=>trim($_POST['nombre']),
            'repeticiones'=>trim($_POST['repeticiones']),
            'duracion'=>trim($_POST['duracion']),
            'avatar'=> "/Assets/img/ejercicios/".$foto,
            'descripcion'=>trim($_POST['descripcion']),
            'tipo'=>trim($_POST['tipo'])
        ];
        if($this->ejercicioModelo->agregarEjercicios($datos)){
            redirecionar('ejercicios');
         }else{
             die('algo salio mal');
         }

     }else{
     
       $this->vista('ejercicios/agregar');
     }

   }

   public function editar($id){
       session_start();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $foto =$_FILES['avatar']['name'];
        $ruta= $_FILES['avatar']['tmp_name'];
        $destino=RUTA_APP."/Assets/img/ejercicios/".$foto;
        copy($ruta,$destino);
        $datos=[
            'id'=>$id,
            'nombre'=>trim($_POST['nombre']),
            'repeticiones'=>trim($_POST['repeticiones']),
            'duracion'=>trim($_POST['duracion']),
            'avatar'=> "/Assets/img/ejercicios/".$foto,
            'descripcion'=>trim($_POST['descripcion']),
            'tipo'=>trim($_POST['tipo'])
        ];

  
       if($this->ejercicioModelo->actualizarEjercicio($datos)){
           redirecionar('ejercicios');
        }else{
            die('algo salio mal');
        }

    }else{
        $ejer = $this->ejercicioModelo->obtenerEjercicioid($id);
        
        $categoria = $this->categoriaModelo->obtenerCategorias();
        $datos=[
            'titulo'=>"Editar ejercicio",
            'id'=>$ejer->id_ejer,
            'nombre'=>$ejer->nombre,
            'repeticiones'=>$ejer->repeticiones,
            'duracion'=>$ejer->duracion,
            'avatar'=> $ejer->animacion,
            'descripcion'=>$ejer->descripcion,
            'tipo'=>$ejer->id_tipo,
            "categorias"=>$categoria
        ];


        
   $this->vista('ejercicios/editar',$datos);
    }
}

public function eliminar($id){
    if($this->ejercicioModelo->borrarEjercicio($id)){
        redirecionar('ejercicios');
     }else{
         die('algo salio mal');
     }

}
}


?>