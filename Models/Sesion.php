<?php class Sesion{

public function __construct(){

    $this->db = new Conexion;
}

public function obtenerSesiones(){
    $this->db->query("SELECT * FROM sesion_entrenamiento as se INNER JOIN sesiones_programadas as sp ON ( sp.codigo_Sesion=se.id_sesion) inner join clientes on (clientes.id=sp.codigo_cliente)
     group by se.id_sesion desc");
    $resultados = $this->db->registros();
    return $resultados;
}

public function agregarSesion($datos){
    $this->db->query("INSERT INTO sesion_entrenamiento (asistencia,fecha,hora_ingreso,estado) values (:asistencia,:fecha,:hora,:activo)");
    $this->db->bind(':asistencia',$datos['asistencia']);
    $this->db->bind(':fecha',$datos['fecha']);
    $this->db->bind(':hora',$datos['hora']);
    $this->db->bind(':activo',$datos['activo']);
    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
 }
 public function obtenerid(){
    $this->db->query("SELECT MAX(id_sesion) as id_sesion FROM sesion_entrenamiento");
    $id = $this->db->registro();
    return $id;
   }

 public function programarSesion($idsesion,$cliente){
   
    $this->db->query("INSERT INTO sesiones_programadas (codigo_sesion,codigo_cliente) values (:sesion,:cliente)");
    $this->db->bind(':sesion',$idsesion);
    $this->db->bind(':cliente',$cliente);
    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}

public function obtenerSesionReciente(){
    $this->db->query("SELECT * FROM sesion_entrenamiento as se INNER JOIN sesiones_programadas as sp ON ( sp.codigo_Sesion=se.id_sesion) inner join clientes on (clientes.id=sp.codigo_cliente) where se.activo = 0");
    $row = $this->db->registros();
    return $row;
   }

public function aprobarSesion($id,$estado){
    $this->db->query("UPDATE sesion_entrenamiento set estado=:activo
    WHERE id_sesion = :id");
    $this->db->bind(':activo',$estado);
    $this->db->bind(':id',$id);
    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}
}