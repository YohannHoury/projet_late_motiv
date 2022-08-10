<?php
    
class User
{
    public int $id;
    public string $userName;
    public string $password;
    public string $email;
    
    
    
    function __construct(?int $id, string $userName,string $password, string $email, )
    {
        if($id !== null)
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }
    
    public function getId() : int
    {
        return $this->id;
    }
    
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function getUsername() : string
    {
        return $this->username;
    }
    
    public function setUsername(string $userName) : void
    {
        $this->username = $userName;
    }
    
    public function getPassword() : string
    {
        return $this->password;
    }
    
    public function setPassword(string $password) : void
    {
        $this->password = $password;
    }
    public function getEmail() : string
    {
        return $this->email;
    }
    
    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }

}
