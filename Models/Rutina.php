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

    public function agregarRutinas($datos){
        $this->db->query("INSERT INTO rutinas(nombre_rutina,descripcion_rutina,id_nivel)
                        VALUES(:nombre,:descripcion,:id)");
        //vincular los valores
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':descripcion', $datos['descripcion']);
        $this->db->bind(':id', $datos['nivel']);
      
        if ($this->db->execute()) {
            return true;

        } else {
            return false;
        }
    }
    public function asignarEjercicios($id,$datos){
        $tam = count($datos);
        for ($i=0; $i < $tam; $i++) { 
            $this->db->query("INSERT INTO rutinas_de_ejercicios(id_rutina,id_ejercicio)
                        VALUES(:rutina,:ejercicio)");
            //vincular los valores
            $this->db->bind(':rutina', $id);
            $this->db->bind(':ejercicio', $datos[$i]);
           $true= $this->db->execute();
        }
        if($true){
            return true;

        } else {
            return false;
        }

       
      
    }
    public function obtenerDetalles($id){
            $this->db->query("SELECT * FROM rutinas INNER JOIN rutinas_de_ejercicios ON (rutinas_de_ejercicios.id_rutina = rutinas.codigo) INNER JOIN ejercicios ON(rutinas_de_ejercicios.id_ejercicio =ejercicios.id_ejer) WHERE rutinas_de_ejercicios.id_rutina=:id");
            $this->db->bind(':id', $id);
          $filas = $this->db->registros();
       return $filas;
    }
    public function obtenerid(){
        $this->db->query("SELECT MAX(codigo) as codigo FROM rutinas");
        $id = $this->db->registro();
        return $id;
       }

       function getValor($campo,$campowhere,$valor){
        
        $this->db->query("SELECT ".$campo ." FROM rutinas WHERE ".$campowhere." = :valor LIMIT 1");
        $this->db->bind(":valor",$valor);
        
        $fila = $this->db->registro();
        
        return $fila;
    }
}