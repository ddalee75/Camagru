<?php

abstract class Model
{
    private static $_bdd;

    // Instancie la connextion a la BDD
    private static function setBdd()
    {
        self::$_bdd= new PDO('mysql:host=mysql8-container;dbname=camagru_DB;charset=utf8', 'root', 'camagru');
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    //Recupere la connextion a la BDD
    protected function getBdd()
    {
        if(self::$_bdd == null)
            self::setBdd();
        return self::$_bdd;
    }

    protected function getAll($table, $obj)
    {
        $var = [];
        $req = $this->getBdd()->prepare('SELECT * FROM ' .$table. ' ORDER BY id desc');
        $req->execute();

        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new $obj($data);
        }
        return $var;

        $req->closeCursor();
    }
}