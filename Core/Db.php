<?php

namespace LateMotivApp\Core;

// On "importe" PDO
use PDO;
use PDOException;

class Db extends PDO
{
    // Instance unique de la classe
    private static $instance;

    // Informations de connexion
    private const DBHOST = 'db.3wa.io';
    private const DBUSER = 'yohannhoury';
    private const DBPASS = '40347cba18f8c6405e376f555da73be9';
    private const DBCHRS = 'utf8mb4';
    private const DBNAME = 'yohannhoury_late_motiv_app';

    private function __construct()
    {
        // DSN de connexion
        $_dsn = 'mysql:dbname='. self::DBNAME . ';host=' . self::DBHOST .';charset='.self::DBCHRS;

        // On appelle le constructeur de la classe PDO
        try{
            parent::__construct($_dsn, self::DBUSER, self::DBPASS);

            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');//charset utf-8
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);//fetch_obj pour l'écritrure obj->property
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    //class Db
    public static function getInstance():Db
    {   
        if(Db::$instance === null){
            Db::$instance = new Db();
        }
        return Db::$instance;
    }
}