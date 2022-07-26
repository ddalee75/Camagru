<?php
class Router{   
    
    private $_ctrl;
    private $_view;

    public function routeReq()
    {
        try
        {
            //Chargement automqtique des Classes (que du dossier "models")
            spl_autoload_register(function($class){
                require_once('models/'.$class.'.php');
            });

            $url= '';

            // le Controller est inclus selon l'4qction de l'utilisateur
            if(isset($_GET['url']))
            {
                $url = explode('/', filter_var($_GET['url'],
                FILTER_SANITIZE_URL));

                $controller = ucfirst(strtolower($url[0])); //1er lettre en Majscule et les reste miniscules
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                if(file_exists($controllerFile))
                {
                    require_once($controllerFile);
                    $this->_ctrl = new $controllerClass($url);
                }
                else 
                    throw new Exception('Page not found');
            }
            else
            {
                require_once('controllers/ControllerAccueil.php');
                $this->_ctrl = new ControllerAccueil($url);
            }
        }
        // Gestion des erreurs
        catch(Exception $e)
        {
            $errorMsg = $e->getMessage();
            require_once('views/viewError.php');

        }

    }

}