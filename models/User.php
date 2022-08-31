<?php


class User
{
    public int $id;
    public string $first_name;

    public function __construct(?int $id, ?string $first_name)
    {
      $this->id = $id; 
      $this->first_name = $first_name;
    }
    
    function getId() : int
    {
        return $this->id;
    }
    
    function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    function getFirstName() : string
    {
        return $this->first_name;
    }
    
    function setFirstName(string $first_name) : void
    {
        $this->first_name = $first_name;
    }
    
}