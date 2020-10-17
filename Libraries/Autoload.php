<?php


    spl_autoload_register(function($class){
        if(file_exists('Libraries/'.$class.".php")){
            
            require_once ('Libraries/'.$class.".php");
        }
    });
?>