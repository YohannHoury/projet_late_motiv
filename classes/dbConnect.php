<?php

class DbConnect
{
        public function __construct()
        {
        /*
           Attention ! le host => l'adresse de la base de données et non du site !!
        
           Pour ceux qui doivent spécifier le port ex : 
           $bdd = new PDO("mysql:host=CHANGER_HOST_ICI;dbname=CHANGER_DB_NAME;charset=utf8;port=3306", "CHANGER_LOGIN", "CHANGER_PASS");
           
         */
            try 
            {
                $bdd = new PDO(
                "mysql:host=db.3wa.io;port=3306;dbname=yohannhoury_late_motiv_app;charset=utf8",
                "yohannhoury","40347cba18f8c6405e376f555da73be9"
                );
            }
            catch(PDOException $e)
            {
                die('Erreur : '.$e->getMessage());
            }
                
                
        }
        
}