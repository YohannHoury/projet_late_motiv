<?php

namespace Models;

// Notre model Users va nous permettre de stocker toutes nos méthodes permettant de réaliser des requêtes
// SQL liées aux utilisateurs
// * Rechercher tous les utilisateurs
// * Rechercher un utilisateur via son id
// * Ajouter un utilisateur
// * Modifier un utilisateur
// * Supprimer un utilisateur
//...

// Notre model extends lui aussi de la Database.

class Users extends Database {

    public function getAllUsers() {
        $req = "SELECT * FROM user ORDER BY user_create_account DESC";
        return $this ->findAll($req);
    }

    // ...
}