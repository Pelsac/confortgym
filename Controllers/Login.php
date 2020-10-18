 <?php      
class Login extends Controller{

    public function __construct()
    {
            $this->usuariomodelo = $this->model("Usuario");
    }
   
     public function index()
    {
        
        $this->vista('Login/login');
    }
    
    public function crear_usuario(){
        $this->vista('Login/registro');
    }
    public function registrar(){
        

        if($_SERVER["REQUEST_METHOD"]="POST"){
            $errors = [];
            $pass= trim($_POST['con_password']);
            $datos = [
                'usuario' => trim($_POST['usuario']),
                'password' => trim($_POST['password']),
                'nombre'=>trim($_POST['nombre']),
                'correo' => trim($_POST['correo']),
                'activacion' => 0,
                'token' => generateToken(),
                'id_rol' =>2
            ];
          
            if(isNull($datos,$pass)){
                $errors[] = "Debe llenar todos los campos";
            }
            if(!isEmail($datos['correo'])){
                $errors[]="Direccion de correo invalida";
            }
            if(!validPassword($datos['password'],$pass)){
                $errors [] = "Las contraseñas no coinciden";
            }
            if(count($errors) == 0){
              
              $datos['password'] = hashPassword(trim($_POST['password']));
                if($this->usuariomodelo->agregarUsuario($datos)){
                    redirecionar('login');
                }else{
                    echo "algo salio mal";
                    die('algo salio mal');
                    
                }
                
            }else{
                
                $this->vista('Login/registro',$datos,$errors);
            }
        

        }else{
            
            echo "hola";
           
        }
    }

    public function iniciarSesion(){
        if($_SERVER["REQUEST_METHOD"]="POST"){
            session_start();
            $errors=[];
          $usuario = trim($_POST['usuario']);
          $password = trim($_POST['password']);
         
            if(isNullLogin($usuario,$password)){
                $errors []= "Debe llenar todos los campos";
                $this->vista("Login/Login",$datos=[],$errors);
            }else
            if($this->usuariomodelo->login($usuario,$password)){
              $fila = $this->usuariomodelo->login($usuario,$password);
                if($this->usuariomodelo->isActivo($usuario)){
                    $validpassw = password_verify($password,$fila->password);
                    if($validpassw){
                        $this->usuariomodelo->lastSession($fila->id);
                        $_SESSION['id_usuario']=$fila->id;
                        $_SESSION['tipo_usuario']=$fila->id_rol;
                         redirecionar('home');

                    }else{
                        $errors[]="La contraseña es incorrecta";
                        $this->vista("Login/Login",$datos=[],$errors);
                    }
                }else{
                    $errors[]="El usuario no esta activo";
                    $this->vista("Login/Login",$datos=[],$errors);
                }
            }else{
                $errors[] = "El usuario o correo electronico no existe";
                $this->vista("Login/Login",$datos=[],$errors);
            }    
        }
        
    }
    

    public function cerrarSesion(){
        session_start();
        session_destroy();
        redirecionar('Login');

    }
    
    }
?>