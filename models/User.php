<?php


class User
{
    private int $id;
    private string $first_name;
    private string $last_name;
    private string $username;
    private string $password;
    private string $role;
    private string $email;
    

    public function __construct(?int $id, string $first_name,string $last_name, string $username,string $password,string $role,string $email)
    {
      $this->id = $id; 
      $this->first_name = $first_name;
      $this->last_name = $last_name;
      $this->username = $username;
      $this->password = $password;
      $this->role = $role;
      $this->email = $email;
    }
    
    function getId() : ?int
    {
        return $this->id;
    }
    
    function setId(?int $id) : void
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
    function getLastName() : string
    {
        return $this->last_name;
    }
    
    function setLastName(string $last_name) : void
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
    }
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
    function getEmail() : string
    {
        return $this->email;
    }
    
    function setEmail(string $email) : void
    {
        $this->Email = $email;
    }
}