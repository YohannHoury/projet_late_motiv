<?php
require_once('models/Router.php');

spl_autoload_register(function($className) {
    require_once lcfirst(str_replace('\\','/', $className)) . '.php';
});

$router = new Router();
?>