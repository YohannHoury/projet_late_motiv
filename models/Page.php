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
    
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function getRoute() : string
    {
        return $this->route;
    }
    
    public function setRoute(string $route) : void
    {
        $this->route = $route;
    }
    
    public function getTitle() : string
    {
        return $this->title;
        var_dump($this->title);
    }
    
    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }
}