<?php

    class Ejercicio{
        public function __construct(){
            $this->db = new Conexion();
        }    

        public function obtenerEjercicios(){
            $this->db->query("SELECT * FROM ejercicios INNER JOIN categoria as cat ON (ejercicios.id_tipo = cat.id)");
            $resultados = $this->db->registros();
            return $resultados;
        }

        
    public function agregarEjercicios($ejercicios)
    {
        $this->db->query("INSERT INTO ejercicios (nombre,duracion,repeticiones,descripcion,animacion,id_tipo)
                        VALUES(:nombre,:duracion,:repeticiones,:descripcion,:animacion,:id_tipo)");
        //vincular los valores
        $this->db->bind(':nombre', $ejercicios['nombre']);
        $this->db->bind(':duracion', $ejercicios['duracion']);
        $this->db->bind(':repeticiones', $ejercicios['repeticiones']);
        $this->db->bind(':descripcion', $ejercicios['descripcion']);
        $this->db->bind(':animacion', $ejercicios['avatar']);
        $this->db->bind(':id_tipo', $ejercicios['tipo']);

        if ($this->db->execute()) {
            return true;

        } else {
            return false;
        }

    }

    public function obtenerEjercicioid($id)
    {
        $this->db->query("SELECT * FROM ejercicios WHERE id_ejer = :id");
        $this->db->bind(':id', $id);

        $fila = $this->db->registro();
        return $fila;
    }


    public function actualizarEjercicio($datos)
    {
        $this->db->query("UPDATE ejercicios set nombre=:nombre,
                                              duracion=:duracion,
                                              repeticiones= :repeticiones,
                                              descripcion = :descripcion,
                                              animacion = :avatar,
                                              id_tipo = :id_tipo
                                              WHERE id_ejer = :id");
        //vincular los valores
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':duracion', $datos['duracion']);
        $this->db->bind(':descripcion', $datos['descripcion']);
        $this->db->bind(':avatar', $datos['avatar']);
        $this->db->bind(':id_tipo', $datos['tipo']);
        $this->db->bind(':repeticiones', $datos['repeticiones']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function borrarEjercicio($codigo){
        $this->db->query("DELETE FROM ejercicios WHERE id_ejer = :id");
        //vincular los valores
           $this->db->bind(':id',$codigo);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    }

?>