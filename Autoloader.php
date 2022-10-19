<?php
namespace LateMotivApp;

use LateMotivApp\Controllers\TasksController;

class Autoloader
{
    
    private $class;
    
    static function register()
    {   
        spl_autoload_register([
            __CLASS__,//__CLASS__ retourne la classe
            'autoload'//appelle la fonction static autoload
        ]);
    }

    static function autoload($class)
    {
        // On récupère dans $class la totalité du namespace de la classe concernée ex:App\Client\Compte
        // On retire App\ de Client\Compte
        $class = str_replace(__NAMESPACE__ . '\\', '', $class);
        
        // On remplace les \ par des /
        $class = str_replace('\\', '/', $class);

        $file = __DIR__ . '/' . $class . '.php';
        // On vérifie si le file existe
        if(file_exists($file)){
            require_once $file; //si il exsite on appelle le fichier
        }
    }
}