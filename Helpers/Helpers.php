<?php


 
        function redirecionar($pagina){
            header('location: '.RUTA_URL.$pagina);
        }
    

        function formatear($datos){
            print_r('<pre>');
            print_r($datos);
            print_r('</pre>');
        } 

        function resultBlock($errors){
            echo "<div id='error' class='alert alert-danger' role='alert'>
                    <a href='#' onclick=\"showHide('error'); \" >X</a>";
            echo "<ul>";
            foreach($errors as $error){
                echo "<li>".$error."</li>";
            }
            echo"</ul>";
            echo "</div>";
        }

        function isNull($datos,$pass){
            if(strlen(trim($datos['nombre']))<1 ||strlen(trim($datos['usuario']))<1||strlen(trim($datos['password']))<1||strlen(trim($pass))<1||strlen(trim($datos['correo']))<1){
                return true;
            }else{
                return false;
            }
        }
        function generateToken(){
            $gen = md5(uniqid(mt_rand(),false));
            return $gen;
        }
        function hashPassword($password){
            $hash= password_hash($password,PASSWORD_BCRYPT);
            return $hash;
        }

        function isEmail($email){
            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                return true;
            }else{
                return false;
            }
        }
        function isNullLogin($usuario,$pass){
            if(strlen(trim($usuario))<1 || strlen(trim($pass))<1){
                return true;
            }else{
                return false;
            }
        }

        function validPassword($var1,$var2){
            if(strcmp($var1,$var2)!=0){
                return false;
            }else{
                return true;
            }
        }

        

        
?>