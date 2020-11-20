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
        $this->db->query("INSERT INTO clientes (nombres,apellidos,fecha_nacimiento,edad,genero,cod_ingreso,en_rutina,cod_usuario)
                        VALUES(:nombres,:apellidos,:fecha_nacimiento,:edad,:genero,:cod_ingreso,:rut,:cod_usuario)");
        //vincular los valores
        $this->db->bind(':nombres', $datos['nombres']);
        $this->db->bind(':apellidos', $datos['apellidos']);
        $this->db->bind(':fecha_nacimiento', $datos['fecha']);
        $this->db->bind(':edad', $datos['edad']);
        $this->db->bind(':genero', $datos['genero']);
        $this->db->bind(':cod_ingreso', $datos['cod']);
        $this->db->bind(':rut', 'no');
        $this->db->bind(':cod_usuario', $datos['cod_usuario']);

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
     public function obteneridUsuario(){
        $this->db->query("SELECT MAX(id) as id FROM usuarios");
        $id = $this->db->registro();
        return $id;
       }
       public function enrutina($id){
        $this->db->query("SELECT en_rutina FROM clientes where id=:cod");
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
       }
       public function ingresar($codigo,$estado){
           
        $this->db->query("UPDATE clientes set en_rutina = :rutina WHERE id = :codigo");
        $this->db->bind(":rutina",$estado);
        $this->db->bind(":codigo",$codigo);
      

         if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
       }

       function clientesenrutinas(){
        $this->db->query("SELECT * FROM clientes where en_rutina='si'");
        $resultados = $this->db->registros();
        return $resultados;
       }
       function getValor($campo,$campowhere,$valor){ 
           
        $this->db->query("SELECT ".$campo ." FROM clientes WHERE ".$campowhere." = :valor LIMIT 1");
        $this->db->bind(":valor",$valor);
        $fila = $this->db->registro();  
        return $fila;
    }

    public function ingresos(){
        $this->db->query("SELECT count(id) as num from clientes WHERE en_rutina = 'si'");
        $row = $this->db->registro();
        return $row;
    }

    function verificarCodigo($codigo){
        $this->db->query("SELECT cod_ingreso from clientes WHERE cod_ingreso = :cod");
        $this->db->bind(':cod',$codigo);
        $row = $this->db->registro();
        if($row){
            return true;
        }else{
            return false;
        }
    }
}
