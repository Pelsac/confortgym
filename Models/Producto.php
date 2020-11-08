<?php

  class Producto{
        public function __construct(){
            $this->db = new Conexion();
        }    

        public function obtenerProductos(){
            $this->db->query("SELECT codigo,nombre,descripcion,imagen FROM productos");
            $resultados = $this->db->registros();
            return $resultados;
        }

        public function agregarProducto($producto)
        {
            $this->db->query("INSERT INTO productos (codigo,nombre,descripcion,imagen)
                            VALUES(:codigo,:nombre,:descripcion,:imagen)");
            //vincular los valores
            $this->db->bind(':codigo', $producto['codigo']);
            $this->db->bind(':nombre',$producto['nombre']);
            $this->db->bind(':descripcion', $producto['descripcion']);
           
            $this->db->bind(':imagen', $producto['imagen']);
    
            if ($this->db->execute()) {
                return true;
    
            } else {
                return false;
            }
    
        }


        public function obtenerProductoid($codigo)
        {
            $this->db->query("SELECT codigo,nombre,descripcion,imagen FROM productos WHERE codigo = :codigo");
            $this->db->bind(':codigo', $codigo);
    
            $fila = $this->db->registro();
            return $fila;
        }
    
        public function actualizarProducto($datos)
        {
            $this->db->query("UPDATE productos set nombre= :nombre,
                                                   descripcion= :descripcion,
                                                   imagen = :imagen
                                                  WHERE codigo = :codigo");
            //vincular los valores
            $this->db->bind(':codigo', $datos['codigo']);
            $this->db->bind(':nombre', $datos['nombre']);
            $this->db->bind(':descripcion', $datos['descripcion']);
            $this->db->bind(':imagen', $datos['imagen']);
        
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    
        public function borrarProducto($codigo)
        {
           
            $this->db->query("DELETE FROM productos WHERE codigo = :codigo");
            //vincular los valores
               $this->db->bind(':codigo',$codigo);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
            function existeNombre($nombre){
                $this->db->query("SELECT nombre from productos WHERE nombre = :nombre");
                $this->db->bind(":nombre",$nombre);
    
                $nombre= $this->db->registro();
                
                if($nombre->nombre){
                    return true;
                }else{
                    return false;
                }
            }
        public function obtenerid(){
            $this->db->query("SELECT MAX(codigo) as codigo FROM productos");
            $id = $this->db->registro();
            return $id;
           }
    }
  

?>