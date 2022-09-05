<?php
require "./models/User.php";


Class UserManager extends DataBase
{
    
    
    function getAllUsersId(): ?array
    // tous les utilisateurs de la base de données identifiés par leurs Id
            {
                $query = $this->bdd->prepare('SELECT * FROM users ORDER BY `users`.`id` ASC');
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_ASSOC);
                
                return $results;
            }
    function getAllUsersUsernames() : ?array
    // tous les utilisateurs de la base de données par identifiés par leurs username
            {
                $query = $this->bdd->prepare('SELECT username FROM users ');
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_ASSOC);
                
                return $results;
            }
    
    function getAllUsersEmails() : ?array
    //tous les utilisateurs de la base de donnéesidentifiés par leurs email
            {
                $query = $this->bdd->prepare('SELECT email FROM users ');
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_ASSOC);
                
                return $results;
            }
    function getUserById(?int $id) : ?User
    // un utilisteur parmi tous le utilsateurs de la base de données ciblé par son Id
        {
            $query= $this->bdd->prepare('SELECT *  FROM users WHERE id = :id');
            $parameters = [
                'id'=> $id
                ];
            $query->execute($parameters);
            $getUser = $query->fetch(PDO::FETCH_ASSOC );
            
            return $getUser;
        }
    function addNewUser(User $user) : void
        // créer un utilisateur dans la base de données sur la table 'users' 
        {
            $id = $user->getId();
            $username = $user->getUsername();
            $password = $user->getPassword();
            $email = $user->getEmail();
            
            $sql = 'INSERT INTO users ( username, password,email) VALUES ( :username, :password, :email)'   ;
            $addUser = $this->bdd->prepare($sql);
            $parameters =
            [
                'username'=>$username,
                'password'=>$password,
                'email'=>$email
               ];
            $addUser->execute($parameters);
        }
    
// mettre à jour les utilisateurs dans la base de données
    function updtUser(User $user) : void
    {
            $id = $user->getId();
            $username = $user->getUsername();
            $email = $user->getEmail();
            $parameters = 
            [
            'id' => $id,    
            'username' => $username,
            'email' => $email,
            ];
            $query = $this->bdd->prepare("UPDATE users SET username=:username, email=:email WHERE users.id=:id");
            $query->execute($parameters);
        }
// supprimer un utilisateur (profil) de la base de données

    function deleteUser(int $id) : void
    {
            $query = $this->bdd->prepare("DELETE FROM users WHERE users.id=:id");
            $parameters = 
            [
            'id' => $id,    
            ];
            $query->execute($parameters);
        }
}
