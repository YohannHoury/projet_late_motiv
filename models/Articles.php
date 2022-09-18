<?php

namespace Models;

// Notre model Articles va nous permettre de stocker toutes nos méthodes permettant de réaliser des requêtes
// SQL liées aux articles
// * Rechercher tous les articles
// * Rechercher un article via son id
// * Ajouter un article
// * Modifier un article
// * Supprimer un article
//...

// Remarquez que notre model ( comme tous nos models ) extends de la Database.
// Ainsi, lorsque vous instancier votre model, vous profitez du constructor de Database permettant de se connecter à la BDD.

class Articles extends Database {

    public function getAllArticles() {
        $req = "SELECT * FROM articles";
        return $this->findAll($req);
    }

    public function getArticleById($id) {
        return $this->getOneById('articles',  $id);
    }

    // public function getAllImagesById($id) {
    //     return $this->getAllById('imagesdetails', 'img_id_article', $id);
    // }

    // public function addNewArticle($data) {
    //     $this->addOne( '?,?,?,?,?,?,?,?',$data);
    // }
}
