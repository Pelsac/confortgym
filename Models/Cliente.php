<?php

class Cliente
{
    private $db;

    public function __construct()
    {
        $this->db = new Conexion();
    }

    public function obtenerClientes()
    {
        $this->db->query("SELECT * FROM clientes");
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function agregarCliente($datos)
    {
        $this->db->query("INSERT INTO clientes (nombres,apellidos,fecha_nacimiento,edad,genero,cod_ingreso)
                        VALUES(:nombres,:apellidos,:fecha_nacimiento,:edad,:genero,:cod_ingreso)");
        //vincular los valores
        $this->db->bind(':nombres', $datos['nombres']);
        $this->db->bind(':apellidos', $datos['apellidos']);
        $this->db->bind(':fecha_nacimiento', $datos['fecha']);
        $this->db->bind(':edad', $datos['edad']);
        $this->db->bind(':genero', $datos['genero']);
        $this->db->bind(':cod_ingreso', $datos['cod']);

        if ($this->db->execute()) {
            return true;

        } else {
            return false;
        }

    }

    public function obtenerClienteid($id)
    {
        $this->db->query("SELECT * FROM clientes WHERE id = :id");
        $this->db->bind(':id', $id);

        $fila = $this->db->registro();
        return $fila;
    }

    public function actualizarCliente($datos)
    {
        $this->db->query("UPDATE clientes set nombres=:nombres,
                                              apellidos=:apellidos,
                                              fecha_nacimiento= :fecha,
                                              edad = :edad,
                                              genero = :genero,
                                              cod_ingreso = :cod
                                              WHERE id = :id");
        //vincular los valores
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':nombres', $datos['nombres']);
        $this->db->bind(':apellidos', $datos['apellidos']);
        $this->db->bind(':fecha', $datos['fecha']);
        $this->db->bind(':edad', $datos['edad']);
        $this->db->bind(':genero', $datos['genero']);
        $this->db->bind(':cod', $datos['cod']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function borrarCliente($id)
    {
       
        $this->db->query("DELETE FROM clientes WHERE id = :id");
        //vincular los valores
           $this->db->bind(':id',$id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
        function existeNombre($nombre){
            $this->db->query("SELECT nombres from clientes WHERE nombres = :nombres");
            $this->db->bind(":nombres",$nombre);

            $nombre= $this->db->registro();
            
            if($nombre->nombres){
                return true;
            }else{
                return false;
            }
        }
    public function obtenerid(){
        $this->db->query("SELECT MAX(id) as id FROM clientes");
        $id = $this->db->registro();
        return $id;
       }
}
