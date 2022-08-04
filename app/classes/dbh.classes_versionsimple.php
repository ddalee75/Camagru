<?php 

class Dbh 
{
    protected function connect()
    {
        try
        {
            $username= "root";
            $password = "camagru";
            $dbh = new PDO('mysql:host=mysql8-container;dbname=camagru_DB', $username, $password);
            return $dbh;

        }
        catch (PDOException $e)
        {
              print "Error!: " . $e->getmessage() . "<br/>";
              die();  
        }
    }
}