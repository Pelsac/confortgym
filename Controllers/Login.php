 <?php
class Login extends Controller
{

    public function __construct()
    {
        $this->usuariomodelo = $this->model("Usuario");
        $this->clienteModelo = $this->model("Cliente");
    }

    public function index()
    {
        session_start();
        $this->vista('login/login');
    }

    public function crear_usuario()
    {
        $this->vista('login/registro');
    }
    public function registrar()
    {
        if ($_SERVER["REQUEST_METHOD"] = "POST") {
            $errors = [];
            $pass = trim($_POST['con_password']);

            //obteniendo datos del cliente
            $datoscliente = [
                'nombres' => trim($_POST['nombres']),
                'apellidos' => trim($_POST['apellidos']),
                'fecha' => trim($_POST['fecha']),
                'edad' => calcularedad($_POST['fecha']),
                'genero' => trim($_POST['genero']),
            ];
            
            $fecha = new DateTime();
            $datos = [
                'nombre' => trim($_POST['alias']),
                'cliente'=>$datoscliente,
                'password' => trim($_POST['password']),
                'correo' => trim($_POST['correo']),
                'token' => generateToken(),
                'fecha' => $fecha->format('y-m-d H:i:s'),
                'activo' => 1,
                'id_rol' =>2,
               
            ];
            $id_user = $this->usuariomodelo->obtenerid();
            
            
            if (isNull($datos, $pass)) {
                $errors[] = "Debe llenar todos los campos";
            }
            if (!isEmail($datos['correo'])) {
                $errors[] = "Direccion de correo invalida";
            }
            if($this->usuariomodelo->verificarEmail($datos['correo'])){
                $errors[] = "La direccion de correo electronico ya se encuentra registrado  en nuestro sistema, por favor ingresa otro.";
            }
            if($this->usuariomodelo->verificarAlias($datos['nombre'])){
                $errors[] = "El alias que ingresaste ya se encuentra registrado  en nuestro sistema, por favor ingresa otro.";
            }
            if (!validPassword($datos['password'], $pass)) {
                $errors[] = "Las contraseñas no coinciden";
            }
            if (count($errors) == 0) {
                
                
                $datos['password'] = hashPassword(trim($_POST['password']));
                $this->usuariomodelo->agregarUsuario($datos);
                $id_user = $this->usuariomodelo->obtenerid();
                $datoscliente = [
                    'nombres' => trim($_POST['nombres']),
                    'apellidos' => trim($_POST['apellidos']),
                    'fecha' => trim($_POST['fecha']),
                    'edad' => calcularedad($_POST['fecha']),
                    'genero' => trim($_POST['genero']),
                    'cod' => '',
                    'cod_usuario'=>$id_user->id
                ];
                if ($this->clienteModelo->agregarCliente($datoscliente)) {
                    redirecionar('login');
                } else {
                    echo "algo salio mal";
                    die('algo salio mal');

                }

            } else {

                $this->vista('login/registro', $datos, $errors);
            }

        } else {

            $this->vista('login/registro', $datos, $errors);
        }
    }

    public function iniciarSesion()
    {
        if ($_SERVER["REQUEST_METHOD"] = "POST") {
            session_start();
            $errors = [];
            $usuario = trim($_POST['usuario']);
            $password = trim($_POST['password']);

            if (isNullLogin($usuario, $password)) {
                $errors[] = "Debe llenar todos los campos";
                $this->vista("Login/Login", $datos = [], $errors);
            } else
            if ($this->usuariomodelo->login($usuario, $password)) {
                $fila = $this->usuariomodelo->login($usuario, $password);
                if ($this->usuariomodelo->isActivo($usuario)) {
                    $validpassw = password_verify($password, $fila->password);
                    if ($validpassw) {
                        $this->usuariomodelo->lastSession($fila->id_user);
                        $_SESSION['id_usuario'] = $fila->id_user;
                
                        $_SESSION['tipo_usuario'] = $fila->id_rol;
                       
                        if($_SESSION['tipo_usuario'] == 2){
                            $_SESSION['alias'] = $fila->alias;
                            $_SESSION['nombres'] = $fila->nombres;
                            $_SESSION['apellidos']=$fila->apellidos;
                            $_SESSION['identificacion']= $fila->id;
                            $_SESSION['token']= $fila->token;
                            
                            redirecionar('Home');
                        }else if ($_SESSION['tipo_usuario'] == 1){
                            $_SESSION['alias'] = $fila->alias;
                            $_SESSION['nombres'] = $fila->alias;
                            $_SESSION['apellidos']=$fila->id;
                            $_SESSION['activo']=$fila->activo; 
                            redirecionar('clientes');
                        }
                       

                    } else {
                        $errors[] = "La contraseña es incorrecta";
                        $this->vista("login/login", $datos = [], $errors);
                    }
                } else {
                    $errors[] = "El usuario no esta activo";
                    $this->vista("login/login", $datos = [], $errors);
                }
            }
            
            else {
                $errors[] = "El usuario o correo electronico no existe";
                $this->vista("login/login", $datos = [], $errors);
            }
        }

    }

    public function cerrarSesion()
    {
        session_start();
        session_destroy();
        redirecionar('login');

    }

    public function recuperar_password()
    {

        $this->vista('login/recuperar_password');
    }

    public function cambiar_pass($id, $token)
    {
        $datos= [
            'id'=>$id,
            'token'=>$token
        ];
        if(empty($id) || empty($token)){
            redirecionar('login');
        }
        if($this->usuariomodelo->verificaTokenPass($id,$token)){
            $this->vista('login/cambiar_password',$datos);
        }else{
            $this->vista('Errors/error');
        }       
        
    }

    function guardar_password(){
        $erros=[];
        $datos=[];
        if ($_SERVER["REQUEST_METHOD"] = "POST") {
                $id = trim($_POST['id']);
                $token = trim($_POST['token']);
                $pass1 = trim($_POST['password1']);
                $pass2 = trim($_POST['password2']);
                if(validPassword($pass1,$pass2)){
                    $pass_has1 = hashPassword($pass1);
                    if($this->usuariomodelo->cambiaPassword($id,$token,$pass_has1)){
                        $datos=['titulo'=>'Contraseña actualizada',
                                'message'=>"La contraseña se modifico correctamente por favor inicie sesion"];
                       redireccionar('login/success');

                    }else{
                        $errors[]="Error al modificar la contraseña";
                        $this->vista('login/cambiar_password',$datos,$errors);
                    }
                }else{
                    $errors[]="Las Contraseñas no coinciden";
                    $this->vista('login/cambiar_password',$datos,$errors);
                }
        }
    }
function success(){
    $datos=['titulo'=>'Contraseña actualizada',
    'message'=>"La contraseña se modifico correctamente por favor inicie sesion"];
    $this->vista('login/success',$datos);
}

    public function restablecer_password()
    {
        $datos=[];
        $errors = [];
        if ($_SERVER["REQUEST_METHOD"] = "POST") {
            $email = trim($_POST['email']);
            if (!isEmail($email)) {
                $errors[] = "Debe ingresar un correo electronico valido";
                $this->vista('login/recuperar_password',$datos,$errors);
               
            }
            if ($this->usuariomodelo->emailExiste($email)) {
                $user_id = $this->usuariomodelo->getValor("id", "correo", $email);
                $nombre = $this->usuariomodelo->getValor("alias", "correo", $email);
                $token = $this->usuariomodelo->generateTokenPass($user_id->id);
              
                $url = 'http://' . $_SERVER["SERVER_NAME"] . '/confortgym/login/cambiar_pass/' . $user_id->id . '/' . $token;
                $asunto = 'Recuperar Contrase&ntilde;a - Confort gym';
                $cuerpo = "Hola $nombre->alias:
                        <br><br>
                        Se ha solicitado un reinicio de contrase&ntilde;a. <br>
                        Para recuperar la contrase&ntilde;a, visita la siguiente direcci&oacute;n <a href='$url'>Restablecer contrase&ntilde;a</a>
                        <b>
                        <br>
                        Estimado cliente, este correo ha sido generado por un sistema de envio; por favor  NO responda al mismo ya que no podra ser gestionado.
                        ";
               
                       if (enviarEmail($email, $nombre->alias, $asunto, $cuerpo)) {


                   $datos=['titulo'=>"¡Falta poco, Por favor verificar email!",
                       'message'=>"Hemos enviado un correo electronico a la direccion $email para restablecer tu contraseña, por favor verificar! <br>"];
                   $this->vista('login/message',$datos);
                } else {
                    $errors[] = "Error al enviar Email";
                    $this->vista('login/recuperar_password',$datos,$errors);
                }
            } else {
                $errors[] = "no existe el correo electronico";
                $this->vista('login/recuperar_password',$datos,$errors);
            }

        } else {
            $this->vista('login/recuperar_password',$datos,$errors);
        }
    }

}
?>