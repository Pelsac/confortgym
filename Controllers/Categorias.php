<?php

    class Categorias extends  Controller{

        public function __construct()
        {
        
        $this->categoriaModelo = $this->model('Categoria');
        }
        public function index()
        {
            session_start();
            $categorias=$this->categoriaModelo->obtenerCategorias();
           
            $datos=[
                'titulo'=>'Listado de categorias',
                
                'categorias'=>$categorias
            ];
            $this->vista('Categorias/index',$datos);
       }
       public function agregar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $cat=trim($_POST['cat']);
            if($this->categoriaModelo->agregarCategoria($cat)){
                redirecionar('categorias');
             }else{
                 die('algo salio mal');
             }
         }else{
           $this->vista('categoria/agregar');
         }
       }
       public function editar(){

       }

       public function eliminar($id){
        if($this->categoriaModelo->borrarCategoria($id)){
            redirecionar('categorias');
         }else{
             die('algo salio mal');
         }

         $this->vista('categorias/index',$datos);
       }

    }



    


    ?>