<?php

     class Errors extends Controller{

         public function __construct()
         {
         }
         public function notFound()
         {
         
             $this->vista('Errors/error');
         }
     }

        $notfound = new Errors();
        $notfound->notFound();
?>