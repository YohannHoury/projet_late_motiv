<?php

class Router{
    
    private function parseRequest(string $request)
    {
    $route = [];
    
    $routeConst = explode("/", $request);
    
    $route["path"] = "/".$routeConst[1];
    
    if(count($routeConst) > 2)
    {
        $route["parameter"]=$routeConst[2];
    }
    else
    {
        $route["parameter"] = null;   
    }
    
    return $route;
  }
    
}