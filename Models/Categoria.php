<?php

    class Categoria{
        public function __construct(){
            $this->db = new Conexion();
        }    

        public function obtenerCategorias(){
            $this->db->query("SELECT * FROM categoria");
            $resultados = $this->db->registros();
            return $resultados;
        }

        public function agregarCategoria($cat){
            $this->db->query("INSERT INTO categoria (categoria) values (:cat)");
            $this->db->bind(':cat',$cat);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }


        public function obtenerCategoriaId($id){

        }

        public function borrarCategoria($id){
            
        $this->db->query("DELETE FROM categoria WHERE id = :id");
        //vincular los valores
           $this->db->bind(':id',$id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        }
    }

?>