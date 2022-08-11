<?php
require "./controllers/routes/RoutingController.php" ;
require "./models/DataBase.php";
require "./managers/PageManager.php";

//j'instancie RoutingController() dans une variable $routing
$routing = new PageManager();

//je verifie si la route existe
if(isset($_GET["route"]))
{
    //j'appelle la methode matchRoute de Page Manager
    $routing->matchRoute($_GET["route"], $_GET, $_POST);
}
else
{
    $routing->matchRoute($_GET["login"], $_GET);
}
