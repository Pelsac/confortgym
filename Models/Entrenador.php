<?php

class Entrenador
{
    private $db;

    public function __construct()
    {
        $this->db = new Conexion();
    }

    public function obtenerEntrenadores()
    {
        $this->db->query("SELECT * FROM entrenadores");
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function agregarEntrenador($datos)
    {
        $this->db->query("INSERT INTO entrenadores(identificacion,nombres,apellidos,celular,fecha_nacimiento,direccion,correo,imagen)
                        VALUES(:identificacion,:nombres,:apellidos,:celular,:fecha_nacimiento,:direccion,:correo,:imagen)");
        //vincular los valores
        $this->db->bind(':identificacion', $datos['identificacion']);
        $this->db->bind(':nombres', $datos['nombres']);
        $this->db->bind(':apellidos', $datos['apellidos']);
        $this->db->bind(':celular', $datos['celular']);
        $this->db->bind(':fecha_nacimiento', $datos['fecha']);
        $this->db->bind(':direccion', $datos['direccion']);
        $this->db->bind(':correo', $datos['correo']);
        $this->db->bind(':imagen', $datos['imagen']);

        if ($this->db->execute()) {
            return true;

        } else {
            return false;
        }

    }

    public function obtenerEntrenadorid($identificacion)
    {
        $this->db->query("SELECT * FROM entrenadores WHERE identificacion = :identificacion");
        $this->db->bind(':identificacion', $identificacion);

        $fila = $this->db->registro();
        return $fila;
    }

    public function actualizarEntrenador($datos)
    {
        $this->db->query("UPDATE entrenadores set 
                                               nombres=:nombres,
                                              apellidos=:apellidos,
                                              celular = :celular,
                                              fecha_nacimiento= :fecha,
                                              direccion = :direccion,
                                              correo = :correo,
                                              imagen = :imagen
                                              WHERE identificacion = :identificacion");
        //vincular los valores
        $this->db->bind(':identificacion', $datos['identificacion']);
        $this->db->bind(':nombres', $datos['nombres']);
        $this->db->bind(':apellidos', $datos['apellidos']);
        $this->db->bind(':celular', $datos['celular']);
        $this->db->bind(':fecha', $datos['fecha']);
        $this->db->bind(':direccion', $datos['direccion']);
        $this->db->bind(':correo', $datos['correo']);
        $this->db->bind(':imagen', $datos['imagen']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function borrarEntrenador($identificacion)
    {
        echo $identificacion;
        $this->db->query("DELETE FROM entrenadores WHERE identificacion = :identificacion");
        //vincular los valores
           $this->db->bind(':identificacion',$identificacion);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
