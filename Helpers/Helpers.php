<?php


 
        function redirecionar($pagina){
            header('localhost'.RUTA_URL.$pagina);
        }
    

        function formatear($datos){
            print_r('<pre>');
            print_r($datos);
            print_r('</pre>');
        } 


        

        
?>