<?php
namespace LateMotivApp\Controllers;

use LateMotivApp\Core\Form;
use LateMotivApp\Models\CategoriesModel;
use LateMotivApp\Models\TasksModel;
use LateMotivApp\Model\UsersModel;

class TasksController extends Controller
{
    
    // affiche une page liste de toutes les tâches de la base de données

    public function index()
    {
        // On instancie le modèle correspondant à la table 'tasks'
        $tasksModel = new TasksModel;

        // On va chercher toutes les tâches actives
        $tasks = $tasksModel->findBy(['active'=> 1]);
        // On génère la vue
        $this->render('tasks/index', compact('tasks'),'layout');
    }

    
    // Affiche 1 tâche
     
     
    public function read(int $id)
    {
        // On instancie le modèle
        $tasksModel = new TasksModel;

        // On va chercher une tâche par son id
        $task = $tasksModel->find($id);

        // On envoie à la vue
        $this->render('tasks/read', compact('task'),'layout');
    }

    // Ajouter une tâche
     
    public function add()
    {
        
        // On vérifie si l'utilisateur est connecté
        if(isset($_SESSION['user']) && !empty($_SESSION['user']['id'])){
            // L'utilisateur est connecté
            // On vérifie si le formulaire est complet
            if(Form::validate($_POST, ['title', 'description','category_id'])){
                // Le formulaire est complet
                // On instancie notre modèle
                $task = new TasksModel;
                $category = new CategoriesModel;
                // On se protège contre les failles XSS
                // strip_tags, htmlentities, htmlspecialchars
                $title = htmlentities($_POST['title']);
                $description = htmlentities($_POST['description']);
                $category = htmlentities($_POST['category_id']);
            
                // On hydrate
                $task->setTitle($title)
                     ->setDescription($description)
                     ->setCategory_id($category)
                     ->setAuthor_id($_SESSION['user']['id'])
                     ->setActive(1)
                     ;

                // On enregistre
                $task->create();
                // On redirige
                $_SESSION['message'] = "Votre tâche a été enregistrée avec succès";
                header('Location: index.php?p=tasks/add');
                exit;
                }else{
                   // Le formulaire est incomplet
                   $_SESSION['erreur'] = !empty($_POST) ? "Le formulaire est incomplet" : '';
                   $title = isset($_POST['title']) ? htmlentities($_POST['title']) : '';
                   $description = isset($_POST['description']) ? htmlentities($_POST['description']) : '';
                   $category = isset($_POST['category_id']) ? htmlentities($_POST['category_id']) : '';
                }
                
                $categoriesModel = new CategoriesModel;
                $categories = $categoriesModel->findAll();
                $tasksModel = new TasksModel;
                $tasks = $tasksModel->findAll();
                $task = $tasksModel->findAll();
                
                
            $this->render('tasks/add', compact('task','tasks','categories'),'layout');
        }else{
            // L'utilisateur n'est pas connecté
            $_SESSION['erreur'] = "Vous devez être connecté(e) pour accéder à cette page";
            header('Location: index.php?p=users/login');
            exit;
        }
    }

  
    public function update(int $id){
        // On vérifie si l'utilisateur est connecté
        if(isset($_SESSION['user']) && !empty($_SESSION['user']['id'])){
            // On va vérifier si l'annonce existe dans la base
            // On instancie notre modèle
            $tasksModel = new tasksModel;

            // On cherche l'annonce avec l'id $id
            $task = $tasksModel->find($id);

            // Si l'annonce n'existe pas, on retourne à la liste des taches
            if(!$task){
                http_response_code(404);
                $_SESSION['erreur'] = "La tâche recherchée n'existe pas";
                header('Location: index.php?p=tasks');
                exit;
            }

            // On vérifie si l'utilisateur est propriétaire de la taches dans la catégorie choisie ou admin
            if($task->author_id !== $_SESSION['user']['id'] && !in_array(1 , [$_SESSION['user']['roles']])){
                    $_SESSION['erreur'] = "Vous n'avez pas accès à cette page";
                    header('Location: index.php');
                    exit;
                
            }

            // On traite le formulaire
            if(Form::validate($_POST, ['title', 'description','category_id'])){
                // On stocke l'annonce
                $task = new TasksModel;
                $category = new CategoriesModel;
                // On se protège contre les failles XSS
                $title = htmlentities($_POST['title']);
                $description = htmlentities($_POST['description']);
                $category = htmlentities($_POST['category_id']);

                // On hydrate
                $taskModif->setId($task->id)
                    ->setTitle($title)
                    ->setDescription($description)
                    ->setCategory_id($category)
                    ->setAuthor_id($_SESSION['user']['id'])
                    ;

                // On met à jour l'annonce
                $taskModif->update();

                // On redirige
                $_SESSION['message'] = "Votre tache a été modifiée avec succès";
                header('Location: index.php?p=categories');
                exit;
            }
            $tasksModel = new TasksModel;
            $tasks = $tasksModel->findAll();
            $task = $tasksModel->find($id);
            // On envoie à la vue
            $this->render('tasks/update',compact('tasks','task'));

        }else{
            // L'utilisateur n'est pas connecté
            $_SESSION['erreur'] = "Vous devez être connecté(e) pour accéder à cette page";
            header('Location: index.php?p=users/login');
            exit;
        }
    
    }
    
    
}    