<?php

class Router
{
    public function __construct()
    {
        if(array_key_exists('path', $_GET)) :

        switch($_GET['path']) {

            // ------- AFFICHAGE DE LA PAGE D'ACCUEIL DE NOTRE SITE AVEC TOUS LES ARTICLES ------- //
            case 'home':
                // On va instancier notre HomeController et pas conséquent, notre autoloader s'exécute.
                $controller = new Controllers\ArticleController();
                // Appel de notre méthode "displayAllArticle()" pour afficher la page d'accueil avec tous les articles.
                $controller->displayAllArticle();
            break;


            // ------- AFFICHAGE DES DETAILS DE L'ARTICLE SELECTIONNE VIA SON ID ------- //
            case 'detailsOfOneArticle':
                if(array_key_exists('id', $_GET)) {
                    $controller = new Controllers\ArticleController();
                    $controller->displayArticleById($_GET['id']);
                } else {
                    header('location: index.php');
                    exit;
                }
            break;


            // ------- AFFICHAGE DU FORMULAIRE D'AJOUT D'UN ARTICLE ------- //
            case 'displayFormAddArticle':
                $controller = new Controllers\ArticleController();
                $controller->displayFormForAddArticle();
            break;


            // ------- SOUMISSION DU FORMULAIRE D'AJOUT D'UN ARTICLE ------- //
            // ------- VERIFICATION + AJOUT DANS LE BDD ou AFFICHAGE DES ERREURS ) ------- //
            case 'submitFormAddArticle':
                $controller = new Controllers\ArticleController();
                $controller->verifAddArticle();
            break;


            // ------- PAGE DES UTILISATEURS: AFFICHE TOUS LES UTILISATEURS ------- //
            case 'users':
                $controller = new Controllers\UsersController();
                $controller->displayAllUsers();
            break;


            // ------- AFFICHAGE DU FORMULAIRE DE CONNEXION ------- //
            case 'connect':
                $controller = new Controllers\UsersController();
                $controller->displayFormConnect();
            break;


            // ------- SOUMISSION DU FORMULAIRE DE CONNEXION ------- //
            case 'submitConnect':
                $controller = new Controllers\UsersController();
                $controller->submitFormConnect();
            break;


            // ------- SI LA ROUTE DANS L'URL N'EST PAS PRESENTE DANS NOTRE SWITCH, REDIRECTION VERS L'ACCUEIL ------- //
            default:
                header('location: index.php?path=home');
                exit;
        }

    // ------- SI Y'A PAS DE ROUTE DANS L'URL, ON REDIRIGE VERS L'ACCUEIL DU SITE ------- //
    else :
        header('Location: index.php?path=home');
        exit;

    endif;

    }
}



?>