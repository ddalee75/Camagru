<?php 

class Dbh 
{
    private $host = "mysql8-container";
    private $dbname = "camagru_DB";
    private $username = "root";
    private $password = "camagru";

    public function connect()
    {
        try
        {
            
            $dbh = new PDO('mysql:host=' .$this->host. ';dbname=' .$this->dbname, $this->username, $this->password);
            // $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $dbh;

        }
        catch (PDOException $e)
        {
              print "Error! Probleme de connection Database !!: " . $e->getmessage() . "<br/>";
              die();  
        }
    }
   
}