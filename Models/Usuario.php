<?php

class Usuario{

    
    private $db;
        
            
    public function __construct()
    {
        $this->db = new Conexion;
    }

    public function agregarUsuario($datos){

    $this->db->query("INSERT INTO usuarios(nombre,password,correo,activo,token, fecha_registro,id_rol,id_cliente)
                                             values(:nombre,:password,:correo,:activo,:token,:fecha_registro,:id_rol,:id_cliente)");
    //vincular los valores
    $this->db->bind(':nombre',$datos['nombre']);
    $this->db->bind(':password',$datos['password']);
    $this->db->bind(':correo',$datos['correo']);
    $this->db->bind(':activo',$datos['activo']);
    $this->db->bind(':token',$datos['token']);
    $this->db->bind(':fecha_registro',$datos['fecha']);
    $this->db->bind(':id_rol',$datos['id_rol']);
    $this->db->bind(':id_cliente',$datos['id_cliente']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function login($usuario,$password){
        $this->db->query("SELECT id, id_rol,password FROM usuarios WHERE usuario = :usuario || correo = :correo limit 1");
        $this->db->bind(':usuario',$usuario);
       $this->db->bind(':correo',$usuario);
 
        $fila = $this->db->registro();
        
 
      return $fila;
    }

    function lastSession($id){
        $this->db->query("UPDATE usuarios SET last_session=NOW(),token_password='',password_request=1 WHERE id = :id");
        $this->db->bind(':id',$id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    function isActivo($usuario){
        $this->db->query("SELECT activacion FROM usuarios WHERE usuario = :usuario || correo = :correo limit 1");
        $this->db->bind(':usuario',$usuario);
        $this->db->bind(':correo',$usuario);
        $this->db->execute();
        $fila = $this->db->registro();
        if($fila){
            return true;
        }else{
            return false;
        }
    }

}


?>