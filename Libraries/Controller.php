<?php
    //clase controlador principal
    class Controller
    {

        
        public function model($modelo)
        {
            //cargar
            if(file_exists('./Models/'.$modelo .'Model.php')){
                require_once './Models/'.$modelo .'Model.php';
                //instaciar modelo
                return new $modelo();
            }else{
                echo "El modelo no existe";
            }
           
        }   
    
        //cargar vista
    
        public function vista($vista,$datos =[])
        {
           //chequer si el archivo vista existe
     
           if(File_exists('./Views/'.$vista .'.php'))
           {
            require_once './Views/'.$vista .'.php';
           }else{
               //si el archivo no esxiste
               die('La vista no existe');
           } 
        }

    }


?>