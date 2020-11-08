<?php

class Usuario{

    
    private $db;
        
            
    public function __construct()
    {
        $this->db = new Conexion;
    }

    public function obtenerUsuarios(){
        $this->db->query("SELECT * FROM usuarios");
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function agregarUsuario($datos){

    $this->db->query("INSERT INTO usuarios(alias,password,correo,activo,token, fecha_registro,id_rol)
                                             values(:alias,:password,:correo,:activo,:token,:fecha_registro,:id_rol)");
    //vincular los valores
    $this->db->bind(':alias',$datos['nombre']);
    $this->db->bind(':password',$datos['password']);
    $this->db->bind(':correo',$datos['correo']);
    $this->db->bind(':activo',$datos['activo']);
    $this->db->bind(':token',$datos['token']);
    $this->db->bind(':fecha_registro',$datos['fecha']);
    $this->db->bind(':id_rol',$datos['id_rol']);
    
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function login($usuario,$password){
        $this->db->query("SELECT usuarios.id as id_user, clientes.nombres, clientes.apellidos, clientes.id, usuarios.alias as alias, id_rol,password FROM usuarios inner join clientes on (clientes.cod_usuario = usuarios.id) WHERE alias= :nombre || correo = :correo limit 1");
        $this->db->bind(':nombre',$usuario);
       $this->db->bind(':correo',$usuario);
 
        $fila = $this->db->registro();
        
      if(empty($fila)){
        $this->db->query("SELECT usuarios.id as id_user, usuarios.alias as alias, id_rol,password FROM usuarios  WHERE alias= :nombre || correo = :correo limit 1");
        $this->db->bind(':nombre',$usuario);
       $this->db->bind(':correo',$usuario);
 
        $fila = $this->db->registro();
        
      }
   
      return $fila;
    }

    function lastSession($id){
        $this->db->query("UPDATE usuarios SET last_session=NOW(),token_password='',password_request=0 WHERE id = :id");
        $this->db->bind(':id',$id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    function isActivo($usuario){
        $this->db->query("SELECT activo FROM usuarios WHERE alias = :nombre || correo = :correo limit 1");
        $this->db->bind(':nombre',$usuario);
        $this->db->bind(':correo',$usuario);
        $this->db->execute();
        $fila = $this->db->registro();
        if($fila){
            return true;
        }else{
            return false;
        }
    }

    function emailExiste($email){
        $this->db->query("SELECT id  FROM usuarios WHERE correo = :correo LIMIT 1");
        $this->db->bind(':correo',$email);
        $fila = $this->db->registro();
        if($fila){
            return true;
        }else{
            return false;
        }
    }

    function getValor($campo,$campowhere,$valor){
        
        $this->db->query("SELECT ".$campo ." FROM usuarios WHERE ".$campowhere." = :valor LIMIT 1");
        $this->db->bind(":valor",$valor);
        
        $fila = $this->db->registro();
        
        return $fila;
    }
    function getValores($campo,$campowhere,$valor){
        
        $this->db->query("SELECT ".$campo ." FROM usuarios WHERE ".$campowhere." = :valor LIMIT 1");
        $this->db->bind(":valor",$valor);
        
        $fila = $this->db->registros();
        
        return $fila;
    }

    function generateTokenPass($id){
        $token = generateToken();
        $this->db->query("UPDATE usuarios SET token_password=:token ,password_request=1 WHERE id = :id");
        $this->db->bind(':token',$token);
        $this->db->bind(':id',$id);
        $this->db->execute();
            return $token;
        
    }

    function verificaTokenPass($id,$token){
        $this->db->query("SELECT activo from usuarios where id = :id and token_password = :token and password_request = 1 limit 1");
        $this->db->bind(':id',$id);
        $this->db->bind(':token',$token);
        $fila = $this->db->registro();
        if($fila){
            return true;
        }else{
            return false;
        }
    }

    function cambiaPassword($id,$token,$password){
        $this->db->query("UPDATE usuarios set password = :password ,token_password = '',password_request=0 WHERE id = :id and  token_password = :token");
        $this->db->bind(':password',$password);
        $this->db->bind(':id',$id);
        $this->db->bind(':token',$token);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function obtenerid(){
        $this->db->query("SELECT MAX(id) as id FROM usuarios");
        $id = $this->db->registro();
        return $id;
       }

}


?>