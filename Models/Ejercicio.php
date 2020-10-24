<?php

    class Ejercicio{
        public function __construct(){
            $this->db = new Conexion();
        }    

        public function obtenerEjercicios(){
            $this->db->query("SELECT * FROM ejercicios");
            $resultados = $this->db->registros();
            return $resultados;
        }
    }

?>