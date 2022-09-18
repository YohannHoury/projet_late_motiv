<?php

namespace Models;

require('config/config.php');

class Model 
{

    protected $pdo;

    //elle se connecte à la bdd
    public function __construct() 
    {
        $this->pdo = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
    }

    protected function findAll($req, $params = []) 
    {
        $query = $this->pdo->prepare($req);
        $query->execute($params);
        return $query->fetchAll(); // Récupérer les enregistrements
    }

    protected function getOneById($table, $pre, $id) 
    {
        $query = $this->pdo->prepare("SELECT * FROM " . $table . " WHERE ". $pre ."id = ?");
        $query->execute([$id]);
        $data = $query->fetch();
        $query->closeCursor(); // On indique au serveur que notre requete est terminée
        return $data;
    }

    protected function getAllById($table, $columnId, $id, $orderBy="") 
    {
        $query = $this->pdo->prepare("SELECT * FROM " . $table . " WHERE ". $columnId ." = ? " . $orderBy);
        $query->execute([$id]);
        $data = $query->fetchAll();
        $query->closeCursor();
        return $data;
    }

    protected function getOneByEmail($table, $email) 
    {
        $query = $this->bdpdoprepare("SELECT * FROM " . $table . " WHERE user_mail = ?");
        $query->execute([$email]);
        $data = $query->fetch();
        $query->closeCursor();
        return $data;
    }

    protected function addOne(string $table, string $columns, string $values, $data ) 
    {
        $query = $this->pdo->prepare('INSERT INTO ' . $table . '(' . $columns . ') values (' . $values . ')');
        $query->execute($data);
        $query->closeCursor();
    }

    protected function deleteOne($table, $condition, $value)
    {
        $query = $this->pdo->prepare( 'DELETE FROM ' . $table . ' WHERE ' . $condition . ' = ?' );
        $query->execute([$value]);
        $query->closeCursor(); // On indique au serveur que notre requete est terminée
    }

    protected function updateOne($table, $newData, $condition, $val)
    {
        //var_dump($val); die;
        // On initialise les sets comme étant une chaine de caractères vide
        $sets = '';
        // On boucle sur les data à mettre à jour pour préparer le data binding
        foreach( $newData as $key => $value )
        {
            // On concatène le nom des colonnes et le paramètre du data binding:  clé = :clé,
            $sets .= $key . ' = :' . $key . ',';
        }
        // On supprime le dernier caractère, donc la derniere virgule
        $sets = substr($sets, 0, -1);
        // On indique la requete SQL
        $sql = "UPDATE " . $table . " SET " . $sets . " WHERE " . $condition . " = :" . $condition;
        // On prépare la requete SQL
        $query = $this->pdo->prepare( $sql );
        // Pour chaque valeur de la recette, on lie la valeur de la clé à chaque :clé
        foreach( $newData as $key => $value ) {
            $query->bindValue(':' . $key, $value);
        }
        // On lie la valeur (par ex, l'id) de la condition à  :condition
        $query->bindValue( ':' . $condition, $val);
        // On execute la requete
        $query->execute();
        // On indique au serveur que notre requete est terminée
        $query->closeCursor();
    }

    protected function search($table, $champ, $chaine)
    {
        $query = $this->pdo->prepare( "SELECT * FROM $table WHERE $champ LIKE ?" );
        $query->execute([ "%$chaine%" ]);
        $result = $query -> fetchAll();
        $query->closeCursor(); // On indique au serveur que notre requete est terminée
        return $result;

    }

}