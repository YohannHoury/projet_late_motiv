<?php

require "autoload.php";

try 
    {

    $router = new Router();

    if(isset($_GET['path']))
    {
        $request = "/".$_GET['path'];
    }
    else
    {
        $request = "/";
    }

    $router->route($routes, $request);
}
catch(Exception $e)
{
    if($e->getCode() === 404)
    {
        require "./templates/404.phtml";
    }
}


$um = new UserManager;
var_dump($um);
var_dump($um->getAllUsersId());
$user = new User(1,'titi','pwd','mail');
var_dump($upd = $um->addNewUser($user)); 
var_dump($um);