<?php
/**
 * @author : Gaellan
 */
require_once "./managers/DataBase.php";
require_once "./managers/PageManager.php";
require_once "./managers/UserManager.php";
require "./controllers/AbstractController.php";
require "./controllers/PageController.php";
require "./controllers/HomeController.php";
require "./controllers/LoginController.php";
require "./controllers/ContactController.php";
require "./controllers/AboutController.php";
require "./controllers/RegistrationController.php";
require "./controllers/AccountController.php";
require "./services/Router.php";

$routes = [];

// Read the routes config file
$handle = fopen("config/routes.txt", "r");

if ($handle) { // if the file exists

    while (($line = fgets($handle)) !== false) { // read it line by line

        $route = []; // each route is an array

        $routeData = explode(" ", str_replace(PHP_EOL, '', $line)); // divide the line in two strings (cut at the " ")

        $route["path"] = $routeData[0]; // the path is what was before the " "

        if(substr_count($route["path"], "/") > 1) // check if the path string has more than 1 "/"
        {
            if(substr($route["path"],-1)=="*") // check if the last char of the path is "*", which represents a parameter
            {

                $route["parameter"] = true; // the route expects a parameter
                $pathData = explode("/", $route["path"]); // divide the path in three strings (cut at the "/")
                $route["path"] = substr($route["path"], 0, -2); // isolate the path without the parameters
                
            }
            else
            {
                $route["parameter"] = false;
            }
        }
        else
        {
            $route["parameter"] = false; // the route does not expect a parameter
        }
        
        $controllerString = $routeData[1]; // the controller string is what was after the " ";

        $controllerData = explode(":", $controllerString); // divide the controller string in two strings (cut at the ":")

        $route["controller"] = $controllerData[0]; // the controller is what was before the ":"

        $route["method"] = $controllerData[1]; // the method is what was after the ":"

        $routes[] = $route; // add the new route to the routes array
    }
    
    fclose($handle); // close the file
}
