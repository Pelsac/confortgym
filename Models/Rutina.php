<?php

class Rutina{
    public function __construct(){
        $this->db = new Conexion();
    }

    public function obtenerRutinas(){
        $this->db->query("SELECT * FROM rutinas");
        $resultados = $this->db->registros();
        return $resultados;
    }
}