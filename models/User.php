<?php


class User
{
    protected int $id;
    protected string $first_name;
    protected string $last_name;
    protected string $username;
    protected string $password;
    protected string $role;
    protected string $email;
    protected string $date;
    
    protected function __construct(?int $id, string $first_name, string $last_name, string $username, string $password,string $role, string $email, DateTime $date )
    {
      $this->id = $id; 
      $this->first_name = $first_name;
      $this->last_name = $last_name;
      $this->username = $username;
      $this->password = $password;
      $this->role = $role; 
      $this->email = $email; 
      $this->date = $date; 
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
    
    function getLastname() : string
    {
        return $this->last_name;
    }
    
    function setLastname(string $last_name) : void
    {
        $this->last_name = $last_name;
    }
    
    function getUsername() : string
    {
        return $this->username;
    }
    
    function setUsername(string $username) : void
    {
        $this->username = $username;
    
    
    function getPassword() : string
    {
        return $this->password;
    }
    
    function setPassword(string $password) : void
    {
        $this->password = $password;
    }
    
    function getRole() : string
    {
        return $this->role;
    }
    
    function setRole(string $role) : void
    {
        $this->role = $role;
    }
    }
    
    function getEmail() : string
    {
        return $this->email;
    }
    
    function setEmail(string $email) : void
    {
        $this->email = $email;
    }
    
    function getDate() : DateTime
    {
        return $this->date;
    }
    
    function setDate(DateTime $date) : void
    {
        $this->date = $date;
    }
     
}