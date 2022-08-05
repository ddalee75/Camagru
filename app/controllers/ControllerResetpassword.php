<?php
class ControllerResetpassword
{
   public function __construct($url)
   {
        if(isset($url) && count(array($url)) > 1)
            throw new Exception('Page not found !!!');
        else
           $this->destination();
   }

   private function destination()
   {
        require_once('./views/viewResetPassword.php');
   }

 }

