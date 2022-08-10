<?php

class UserManager
{
     public function getUser() : user 
        { 
        
        $check = $bdd->prepare('SELECT username,password,email FROM users WHERE :id');
        $parameters =[
        'id' => $id,
        'username' => $username,
        'password' => $password,
        'email' => $email
            ];
        $check->execute($parameters);
        $data = $check->fetch(PDO::FETCH_ASSOC);
        return $data;
        
        $user = [];
        }
    
}