<?php


 
        function redirecionar($pagina){
            header('location: '.RUTA_URL.$pagina);
        }
        
        function calcularedad($fecha){
            $fecha = new DateTime($fecha);
            $hoy = new DateTime();
            $edad = $hoy->diff($fecha);
            return $edad->y;
        }
        function isAjax(){
             return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
        }

        function formatear($datos){
            print_r('<pre>');
            print_r($datos);
            print_r('</pre>');
        } 

        function resultBlock($errors){

            echo "<div class='card bg-danger m-2'>
                        <div class='card-tools'>
                            <button type='button' class='btn btn-tool' data-card-widget='remove'><i class='fas fa-times'></i>
                            </button>
                        </div>
                    <div class='card-body'>";
            echo "<ul>";
            foreach($errors as $error){
                echo "<li>".$error."</li>";
            }
            echo"</ul>";
            echo "</div> </div>";
        }

        function isNull($datos,$pass){
            if(strlen(trim($datos['nombre']))<1 ||strlen(trim($datos['password']))<1||strlen(trim($pass))<1||strlen(trim($datos['correo']))<1){
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

        function enviarEmail($email, $nombre, $asunto, $cuerpo){
		
            require_once './PHPMailer/PHPMailerAutoload.php';
            
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls'; //Modificar
            $mail->Host = 'smtp.gmail.com'; //Modificar
            $mail->Port = 587; //Modificar
            
            $mail->Username = 'confortgymlorica@gmail.com'; //Modificar
            $mail->Password = 'confort123L'; //Modificar
            
            $mail->setFrom('confortgymlorica@gmail.com', 'Confort Gym Lorica'); //Modificar
            $mail->addAddress($email, $nombre);
            
            $mail->Subject = $asunto;
            $mail->Body    = $cuerpo;
            $mail->IsHTML(true);
            
            if($mail->send())
            return true;
            else
            return false;
        }

        
?>