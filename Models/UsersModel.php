<?php
namespace LateMotivApp\Models;

class UsersModel extends Model
{
    protected $id;
    protected $username;
    protected $email;
    protected $password;
    protected $media_id;
    protected $roles;

    public function __construct()
    {
        $this->table = 'users';
    }

    
    // Récupérer un utilisateur à partir de son pseudo

    public function findOneByUsername(string $username)
    {
        return $this->request("SELECT * FROM {$this->table} WHERE username = ?", [$username])->fetch();
    }

    
    //  Crée la session de l'utilisateur
     
    public function setSession()
    {
        $_SESSION['user'] = [
            'id' => $this->id,
            'username' => $this->username,
            'roles' => $this->roles
        ];
    }

    
    public function getId()
    {
        return $this->id;
    }

   
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }
    
    public function getEmail()
    {
        return $this->email;
    }

    
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    
    public function getPassword()
    {
        return $this->password;
    }

   
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
    
     public function getMedia_id()
    {
        return $this->media_id;
    }

   
    public function setMedia_id($media_id)
    {
        $this->media_id = $media_id;

        return $this;
    }
    
    
    // utilisateur  == 0(défaut) et administrateur == 1
   public function getRoles():array
    {
        $roles = $this->roles;

        $roles[] = 0;

        return array_unique($roles);
    }


    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

}