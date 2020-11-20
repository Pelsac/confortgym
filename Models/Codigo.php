<?php

class Codigo
{
    private $db;

    public function __construct()
    {
        $this->db = new Conexion();
    }

    public function guardar($codigo){
        $this->db->query("INSERT INTO codigos (codigo) values (:c)");
        $this->db->bind(':c',$codigo);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerCodigo($id)
    {
        $this->db->query("SELECT * FROM codigos WHERE codigo = :id");
        $this->db->bind(':id', $id);

        $fila = $this->db->registro();
        return $fila;
    }
}