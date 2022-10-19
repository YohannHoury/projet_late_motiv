<?php

namespace LateMotivApp\Models;

use LateMotivApp\Core\Db;

class Model extends Db
{
    // Table de la base de données
    protected $table;

    // Instance de Db
    private $db;
    

/*******************************READ*******************************************************************/

//methode générale du model pour lire toute la table mentionné
    public function findAll()
    {
        $req=$this->request('SELECT * FROM ' . $this->table);
        
        return $req->fetchAll();
    }
//methode générale du model pour lire une ligne de la table selon critères
    public function findBy(array $criterias)
    {
        $fields = [];
        $values = [];
    
        // On boucle pour "éclater le tableau"
        foreach($criterias as $field => $value){
            $fields[] = "$field = ?";
            $values[]= $value;
        }
    
        // On transforme le tableau en chaîne de caractères séparée par des AND
        $liste_fields = implode(' AND ', $fields);
    
        // On exécute la requête
        return $this->request("SELECT * FROM {$this->table} WHERE $liste_fields", $values)->fetchAll();
    }
   
        

//methode générale du model pour lire une ligne de la table mentionné par son id
    public function find(int $id)
    {
        return $this->request("SELECT * FROM $this->table WHERE id = $id")->fetch();
    }

/*******************************CREATE**********************************************************************************************/

//methode générale du model pour créer un objet selon le modèle choisi
    public function create()
    {
        //on utilise trois tableaux
        $fields = [];//représente les champs du  formulaires
        $question = [];//représente les valleurs non remplis par '?'
        $values = [];//représente les valeurs

        // On boucle pour éclater le tableau
        foreach ($this as $field => $value) {
            // INSERT INTO taches (titre, description, actif) VALUES (?, ?, ?)
            // on écarte les champs $Db et $Table de la requête car nous n'en avons pas besoin
            if ($value !== null && $field != 'db' && $field != 'table') {
                $fields[] = $field;
                $question[] = "?";
                $values[] = $value;
            }
        }

        // On transforme le tableau "props" en une chaine de caractères
        $list_fields = implode(', ', $fields);
        // On fait de même avec le tableau "question"
        $list_question = implode(', ', $question);

        // On exécute la requête
        return $this->request('INSERT INTO ' . $this->table . ' (' . $list_fields . ')VALUES(' . $list_question . ')', $values);
        
    }
    


/*******************************UPDATE***********************************************************************************************/

//methode générale du model pour modifier les donnèes de l'objet
    public function update()
    {
        $fields = [];
        $values = [];

        // On boucle pour éclater le tableau
        foreach ($this as $field => $value) {
            // UPDATE annonces SET titre = ?, description = ?, actif = ? WHERE id= ?
            if ($value !== null && $field != 'db' && $field != 'table') {
                $fields[] = "$field = ?";
                $values[] = $value;
            }
        }
        $values[] = $this->id;

        // On transforme le tableau "props" en une chaine de caractères
        $list_fields = implode(', ', $fields);

        // On exécute la requête
        return $this->request('UPDATE ' . $this->table . ' SET ' . $list_fields . ' WHERE id = ?', $values);
    }

/*******************************DELETE********************************************************************************************/

//methode générale du model pour supprimer l'objet

    public function delete(int $id)
    {
        return $this->request("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }


/*******************************REQUEST or not REQUEST****************************************************************************/

//methode générale pour lancer un requête préparéés ou simple
    public function request(string $sql, array $attributs = null)
    {
        // On récupère l'instance de Db
        $this->db = Db::getInstance();

        // On vérifie si on a des attributs
        if ($attributs !== null) {
            // Requête préparée
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
        } else {
            // Requête simple
            return $this->db->query($sql);
        }
    }


/*****************HYDRATE ******************************************************************************************************/

//methode générale du model pour hydrater la classe grâce au setter ex : entrèes de formulaire
    public function hydrate($datas)
    {
        foreach ($datas as $key => $value) {
            // On récupère le nom du setter correspondant à la clé (key)
            // title -> setTitle
            $setter = 'set' . ucfirst($key);

            // On vérifie si le setter existe
            if (method_exists($this, $setter)) {
                // On appelle le setter
                $this->$setter($value);
            }
        }
        return $this;
    }
    
}
