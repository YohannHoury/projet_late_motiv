<?php
require "./models/User.php";



Class UserManager extends DataBase
{
    function getAllUsersId(): array// read users consultations de la base de données
        {
        $query = $this->bdd->prepare('SELECT * FROM `users` ORDER BY `users`.`id` ASC');
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        
        return $results;

        }   
    function getUserById(int $uid) : ?User
        {
           $query= $this->bdd->prepare('SELECT * FROM users WHERE id = :id');
           $parameters = [
               'id'=> $uid
               ];
           $query->execute($parameters);
           $getUser = $query->fetch(PDO::FETCH_ASSOC);
           
           return $getUser;
        }
    function addUser(?int $id, string $first_name,string $last_name, string $username,string $password,string $role,string $email ) : void
        // create users ajouter un utilisateur à la base de données 
        {
         $sql = 'INSERT INTO users (first_name, last_name, username, password, role, email) VALUES ( :first_name, :last_name, :username, :password, :role, :email)';
         $addUser = $this->bdd->prepare($sql);
         $parameters =
         [
             'first_name'=>$first_name,
             'last_name'=>$last_name,
             'username'=>$username,
             'password'=>$password,
             'role'=>$role,
             'email'=>$email
            ];
         $addUser->execute($parameters);
        }
    
// update users mettre à jour les utilisateurs dans la base de données
    function updtUser(User $user):void
    {
        
    }
// delete users supprimer utilisateurs de la base de données
}
$user = new UserManager();
return $user;