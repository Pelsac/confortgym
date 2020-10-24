<?php

    class Categoria{
        public function __construct(){
            $this->db = new Conexion();
        }    

        public function obtenerCategoria(){
            $this->db->query("SELECT * FROM categorias");
            $resultados = $this->db->registros();
            return $resultados;
        }
    }

?>