<?php
    /*mapear la url  ingresada en el 
    navegador
    1-controlador
    2-metodo
    3-parametro
    ejemplo: articulos/actualizar/4
    */

    class Core{
        protected $controladorActual = 'Home';
        protected $metodoActual = 'index';
        protected $parametro = [];
        //constructor
        public function __construct(){
               $url = $this->getUrl();
               
               //buscar en los controladores si el controlador existe
               if(file_exists('Controllers/'.ucwords($url[0]).'.php')){
                //si exite se configura por controlador por defecto
                $this->controladorActual = ucwords($url[0]);
                //unset indice
                unset($url[0]);

               }
                  //requerir en controlador
                  require_once 'Controllers/'. $this->controladorActual.'.php';
                  $this->controladorActual = new $this->controladorActual;
               if(isset($url[1])){
                if (method_exists($this->controladorActual,$url[1])) {
                    //checeamos el metodo
                    $this->metodoActual = $url[1];
                    unset($url[1]);
                 }
              }
                //verificar la segunda parte de la url que seria el metodo
          //para probar traer metodo
         // echo $this->metodoActual;
         //obtener los posibles parametro
         $this->parametro = $url ? array_values($url):[];
         //llamar callback con parametros array
        call_user_func_array([$this->controladorActual,$this->metodoActual],$this->parametro);
              
              
             
              
        }
        public function getUrl(){
          //  echo $_GET['url'];
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'],'/');
                $url = filter_var($url,FILTER_SANITIZE_URL);
                $url = explode('/',$url);
                return $url;
            }
        }
    }

?>