<?php
class DataBase
{
 protected PDO $bdd;

 
   public function __construct()
   {
    try
       {
         $this->bdd = new PDO ('mysql:host=db.3wa.io;port=3306;dbname=yohannhoury_late_motiv_app',
                    'yohannhoury',
                    '40347cba18f8c6405e376f555da73be9',$options=[PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'],);
        
       }
       catch (PDOException $e)
       {
         throw new PDOException($e->getMessage(), (int)$e->getCode());
         die();
       }     
   }
}
?>
