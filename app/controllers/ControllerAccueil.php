<?php
class ControllerAccueil
{
    private $_destination;
//    private $_view;

   public function __construct($url)
   {
        if(isset($url) && count(array($url)) > 1)
            throw new Exception('Page not found !!!');
        else
           $this->destination();
   }

   private function destination()
   {
        // $this->_articleManager = new ArticleManager;
        // $articles = $this->_articleManager->getArticles();

        require_once('./views/viewAccueil.php');
   }

 }