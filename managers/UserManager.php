<?php
require_once './config/DataBase.php';
require './models/User.php';



// read users consultations de la base de données


    function getAllUsersId(): array
        {
        $pdo=getPdo();
        $query = $pdo->prepare('SELECT * FROM `users` ORDER BY `users`.`id` ASC');
        $query->execute();
        $bdd = $query->fetchAll(PDO::FETCH_DEFAULT);

          return $bdd; 
        }   
         function getUserById(int $id = 0) : ?array
     {
        $pdo = getPdo();
        $query = $pdo->prepare('SELECT * FROM users WHERE users.id = :id');
        $parameters = [
            'id'=> $id
            ];
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_DEFAULT);
        
        return $result;
     }
        
// create users ajouter un utilisateur à la base de données   

// update users mettre à jour les utilisateurs dans la base de données

// delete users supprimer utilisateurs de la base de données
        
        