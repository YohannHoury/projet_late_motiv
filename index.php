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
var_dump($user->addUser(8,'paul','jack','polo','ppj125','user','cage@coco.com'));
var_dump($user->getAllUsersId());