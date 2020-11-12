<?php
    //clase controlador principal
    class Controller
    {

        
        public function model($modelo)
        {
            //cargar
            if(file_exists('./models/'.$modelo .'.php')){
                require_once './models/'.$modelo .'.php';
                //instaciar modelo
                return new $modelo();
            }else{
                echo "El modelo no existe";
            }
           
        }   
    
        //cargar vista
    
        public function vista($vista,$datos =[],$errors=[])
        {
           //chequer si el archivo vista existe
     
           if(File_exists('./views/'.$vista .'.php'))
           {
            require_once './views/'.$vista .'.php';
           }else{
               //si el archivo no esxiste
               die('La vista no existe');
           } 
        }

    }


?>