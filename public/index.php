<?php
use LateMotivApp\Autoloader;
use LateMotivApp\Core\Router;

// On définit une constante contenant le dossier racine du projet
define('ROOT', dirname(__DIR__));

// On importe l'autoloader
require_once ROOT.'/Autoloader.php';
Autoloader::register();

// On instancie Main (notre routeur)
$app = new Router();

// On démarre l'application
$app->start();
