<?php

    class Rol{
        public function __construct(){
            $this->db = new Conexion();
        }    

        public function obtenerRoles(){
            $this->db->query("SELECT * FROM roles");
            $resultados = $this->db->registros();
            return $resultados;
        }

    }

?>