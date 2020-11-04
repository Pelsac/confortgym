<?php

class Notificacion{

    public function __construct(){
        $this->db = new Conexion();
    }


    public function enviar($datos){
       
        $this->db->query("INSERT INTO notificacion (mensaje, leido ,fecha) values(:mensaje,:leido,:fecha)");
        $this->db->bind(":mensaje",$datos['mensaje']);
        $this->db->bind(":leido",0);
        $this->db->bind(":fecha",$datos['fecha']);
        if ($this->db->execute()) {
          $row = $this->obtenerid();
          $tam = count($datos['id2']);

             for($i=0; $i < $tam; $i++){
                $this->db->query("INSERT INTO notificar (id_usuario,id_usuario2,cod_notificacion) values(:user1,:user2,:cod)");
                $this->db->bind(":user1",$datos['id1']);
                $this->db->bind(":user2",$datos['id2'][$i]->id);
                $this->db->bind(":cod",$row->id);
                $true = $this->db->execute();
             }
            if($true){
                return true;
            }else{
                return false;
            }

        } else {
            return false;
        }

       
    }

    public function obtenerNotificaciones(){
        $this->db->query("SELECT * FROM usuarios INNER JOIN notificar on(notificar.id_usuario =usuarios.id)
        INNER JOIN notificacion on (notificacion.idNotificacion=notificar.cod_notificacion)");
         $resultados = $this->db->registros();
         return $resultados;
    }

    public function obtenerid(){
        $this->db->query("SELECT MAX(idNotificacion) as id FROM notificacion");
        $id = $this->db->registro();
        return $id;
       }
}