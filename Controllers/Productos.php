<?php

    class Productos extends  Controller{

        public function __construct()
        {
        
        $this->productoModelo = $this->model('Producto');
        }
        public function index()
        {
            session_start();
            $productos=$this->productoModelo->obtenerProductos();
           
            $datos=[
                'titulo'=>'Listado de productos',
                
                'productos'=>$productos
            ];
            $this->vista('productos/index',$datos);
       }
       public function agregar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $foto =$_FILES['imagen']['name'];
            $ruta= $_FILES['imagen']['tmp_name'];
            $destino=RUTA_APP."/Assets/img/productos/".$foto;
            copy($ruta,$destino);
            $datos=[
               
                'nombre'=>trim($_POST['nombre']),
                'descripcion'=>trim($_POST['descripcion']),
                             
                'imagen'=> "/Assets/img/productos/".$foto
                
                           ];
            if($this->productoModelo->agregarProducto($datos)){
                redirecionar('productos');
             }else{
                 die('algo salio mal');
             }
    
         }else{
         
           $this->vista('productos/agregar');
         }
    
       }

          public function editar($codigo){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $foto =$_FILES['imagen']['name'];
                $ruta= $_FILES['imagen']['tmp_name'];
                $destino=RUTA_APP."/Assets/img/productos/".$foto;
                copy($ruta,$destino);
                $datos=[
                    'codigo'=>$codigo,
                    'nombre'=>trim($_POST['nombre']),
                    'descripcion'=>$_POST['descripcion'],
                    'imagen'=>"/Assets/img/productos/".$foto
                   
                ];
    
          
               if($this->productoModelo->actualizarProducto($datos)){
                   redirecionar('productos');
                }else{
                    die('algo salio mal');
                }
    
            }else{
                $producto = $this->productoModelo->obtenerProductoid($codigo);
                $datos = [
                    'codigo'=> $producto->codigo,
                    'nombre'=>$producto->nombre,
                    'descripcion'=>$producto->descripcion,
                    'imagen'=>$producto->imagen
                    
                ];
    
    
                
              $this->vista('productos/editar',$datos);
            }
        
        
    }
        

       

       public function eliminar($codigo){
        $producto = $this->productoModelo->obtenerProductoid($codigo);
        $datos = [
        'codigo'=> $producto->codigo,
        'nombre'=>$producto->nombre,
        'descripcion'=>$producto->descripcion,
         'cantidad'=>$producto->cantidad,
        'imagen'=>$producto->imagen
        ];



        if($this->productoModelo->borrarproducto($codigo)){
            redirecionar('productos');
         }else{
             die('algo salio mal');
         }

         $this->vista('productos/index',$datos);
       }

    }



    

    
    ?>