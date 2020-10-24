<?php

    class Nivel{
        public function __construct(){
            $this->db = new Conexion();
        }    

        public function obtenerNiveles(){
            $this->db->query("SELECT * FROM niveles");
            $resultados = $this->db->registros();
            return $resultados;
        }
    }

?>