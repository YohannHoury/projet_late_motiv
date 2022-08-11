<?php

class Page
{
   private int $id;
   private string $route;
   private string $title;
 
   
    function __construct(int $id, string $route, string $title)
    {
    $this->id = $id;
    $this->route = $route;
    $this->title = $title;
    }

    public function getId() : int
    {
        return $this->id;    
    }
    public function setId(int $id)
    {
        return $this->id;    
    } 
    public function getRoute() : string
    {
        return $this->route;    
    }
    public function setRoute(string $route)
    {
        return $this->route;      
    } 
    public function getTitle() : string
    {
        return $this->title;
    }
    
    public function setTitle(string $title)
    {
        $this->title = $title;
    }
    
}    
