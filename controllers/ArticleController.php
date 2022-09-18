<?php

namespace Controllers;

// Notre ArticleController va nous permettre de gérer tout ce qui touche aux articles
// * Affichage des articles
// * Affichage d'un article précis
// * Création d'un article
// * Modification d'un article
// * Suppression d'un article
// ...

class ArticleController {

    public function displayAllArticle() {

        $model = new \Models\Articles();
        $articles = $model->getAllArticles();

        require_once('config/config.php');
        $template = "home.phtml";
        include_once 'views/layout.phtml';
    }

    // Méthode permettant d'afficher le formulaire VIDE d'ajout d'un article
    public function displayFormForAddArticle() {
        $model = new \Models\Categories();
        $categories = $model->getAllCategories();

        require_once('config/config.php');
        $template = "formAddArticle.phtml";
        include_once 'views/layout.phtml';
    }


    // Méthode permettant d'afficher les détails d'un article précis
    public function displayArticleById($id) {

        $model = new \Models\Articles();
        $article = $model->getArticleById($id);
        $allImages = $model->getAllImagesById($id);

        $template = "displayAllDetailsOfArticle.phtml";
        include_once 'views/layout.phtml';
    }


    // Méthode permettant d'ajouter un article ( avec vérification du remplissage du formulaire )
    public function verifAddArticle() {

        //var_dump($_POST);
        //var_dump($_FILES);

        $errors = [];
        $valids = [];

        $addArticle = [
                        'addtitle'          => '',
                        'addUnderTitle'     => '',
                        'addDescription'    => '',
                        'addDate'           => '',
                        'addPrice'          => '',
                        'addImg'            => '',
                        'addCategorie'      => ''
        ];

        if(array_key_exists('title', $_POST) && array_key_exists('underTitle', $_POST)
                && array_key_exists('story', $_POST) && array_key_exists('date_start', $_POST)
                && array_key_exists('price', $_POST) && array_key_exists('categorie', $_POST)) {

            // Histoire de ne courir aucun risque d'injection de code ou de données malveillantes,
            // passons toutes les informations du formulaire à la "machine à laver"
            // Notre méthode de nettoyage est disponible dans notre model "Results", elle s'appelle "cleaned()"
            $model = new \Models\Results();
            $addArticle = [
                            'addtitle'          => $model->cleaned($_POST['title']),
                            'addUnderTitle'     => $model->cleaned($_POST['underTitle']),
                            'addDescription'    => $model->cleaned($_POST['story']),
                            'addDate'           => $model->cleaned($_POST['date_start']),
                            'addPrice'          => $model->cleaned($_POST['price']),
                            'addImg'            => 'noPicture.png',
                            'addCategorie'      => $model->cleaned($_POST['categorie'])
            ];

            // Notre tableau associatif contient désormais des données sûres, nettoyées !!!

            // Vérifions maintenant le remplissage du formulaire.
            // A chaque erreur détectée, on ajoute une mention dans notre tableau d'erreurs, initialement vide.

            if($addArticle['addCategorie'] == '')
                $errors[] = "Veuillez remplir le champ 'Categorie' !";

            if($addArticle['addtitle'] == '')
                $errors[] = "Veuillez remplir le champ 'Titre' !";

            if($addArticle['addUnderTitle'] == '')
                $errors[] = "Veuillez remplir le champ 'Sous-Titre' !";

            if($addArticle['addDescription'] == '')
                $errors[] = "Veuillez remplir le champ 'Description' !";

            if($addArticle['addDate'] == '')
                $errors[] = "Veuillez remplir le champ 'Date' !";

            if (!is_numeric($addArticle['addPrice']) || $addArticle['addPrice'] == '' || $addArticle['addPrice'] <= 0)
                $errors[] = "Veuillez remplir le champ 'Prix' correctement !";

            // Si vous avez besoin de vérifier un champ de type "email" :
            // if(!filter_var($user['email'], FILTER_VALIDATE_EMAIL))
            //    $errors[] =  'Veuillez renseigner un email valide SVP !';

            if(count($errors) == 0) {

                // Notre formulaire contient la possibilité de charger une image, on va donc utiliser notre
                // méthode "upload" présente dans notre model "Uploads".
                // Si aucune image n'a été uploadée dans le formulaire, on va garder dans notre tableau 'noPicture.png'
                // A défaut, on change le nom de l'image dans le tableau $addArticle['addImg']
                if(isset($_FILES['imag_article']) && $_FILES['imag_article']['name'] != '') {
                    $dossier = "img_Of_Articles";
                    $model = new \Models\Uploads();
                    $addArticle['addImg'] = $model->upload($_FILES['imag_article'], $dossier, $errors);
                }

                $model = new \Models\Results();
                $dateActuelle = $model->dateNow('Y-m-d H:i:s', 'Europe/Paris');

                $data = [
                            $addArticle['addtitle'],
                            $addArticle['addUnderTitle'],
                            $addArticle['addDescription'],
                            $addArticle['addPrice'],
                            $model->cleaned($addArticle['addImg']), // On oublie pas de nettoyer le nom de l'image !
                            $addArticle['addDate'],
                            1,
                            $addArticle['addCategorie']
                ];

                $add = new \Models\Articles();
                $addMore = $add->addNewArticle($data);
                $valids[] = "L'article a bien été enregistré !";
            }

            // Dans l'optique où le formulaire ne serait pas correctement rempli, on affiche les erreurs
            // Et on réalimente notre "select" des catégories
            $add = new \Models\Categories();
            $categories = $add->getAllCategories();
        }
        require_once('config/config.php');
        $template = "formAddArticle.phtml";
        include_once 'views/layout.phtml';
    }
}