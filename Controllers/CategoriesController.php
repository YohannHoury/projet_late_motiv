<?php
namespace LateMotivApp\Controllers;

use LateMotivApp\Core\Form;
use LateMotivApp\Models\CategoriesModel;
use LateMotivApp\Models\TasksModel;
use LateMotivApp\Models\UsersModel;

class CategoriesController extends Controller
{
    
    // affiche une page liste de toutes les tâches de la base de données

    public function index()
    {
        // On instancie le modèle correspondant à la table 'categories'
        $categoriesModel = new CategoriesModel;

        // On va chercher toutes les catégories actives
        $categories = $categoriesModel->findBy(['active'=> 1]);

        // On génère la vue
        $page = $this->render('categories/index', compact('categories'),'layout');
    }
    
    public function read(int $id)
    {
        // On instancie le modèle
        $categoriesModel = new CategoriesModel;
        
        // On va chercher une catégorie par son id
        $category = $categoriesModel->find($id);
        $category = $_SESSION['user']['id'];
        // On envoie à la vue
        $this->render('categories/index', compact('category'),'layout');
    }
    public function daily(){
        // On instancie le modèle
        $categoriesModel = new CategoriesModel;
        $tasksModel = new TasksModel;
        $usersModel = new UsersModel;
        // On va chercher une tâche par son category_id => 1 pour ne faire apparaitre les tachesde la catégorie Vie quotidienne
        $category = $categoriesModel->findAll();
        $tasks = $tasksModel->findBy(['category_id' => 1]);
        $task = $tasksModel->findBy(['category_id'=> 1]);
        $user = $usersModel->findAll();
       
        // On envoie à la vue
        
        
        $this->render('categories/daily', compact('category','task','tasks','user'),'layout');
    }
    
    public function medical(){
        $categoriesModel = new CategoriesModel;
        $tasksModel = new TasksModel;
        $usersModel = new UsersModel;
        // On va chercher une tâche par son category_id => 1 pour ne faire apparaitre les tachesde la catégorie Vie quotidienne
        $category = $categoriesModel->findAll();
        $tasks = $tasksModel->findBy(['category_id' => 2]);
        $task = $tasksModel->findBy(['category_id'=> 2]);
        $user = $usersModel->findAll();
       
        // On envoie à la vue
        
        
        $this->render('categories/medical', compact('category','task','tasks','user'),'layout');
    }
    public function sport(){
        // On instancie le modèle
        $categoriesModel = new CategoriesModel;
        $tasksModel = new TasksModel;
        $usersModel = new UsersModel;
        // On va chercher une tâche par son category_id => 1 pour ne faire apparaitre les tachesde la catégorie Vie quotidienne
        $category = $categoriesModel->findAll();
        $tasks = $tasksModel->findBy(['category_id' => 3]);
        $task = $tasksModel->findBy(['category_id'=> 3]);
        $user = $usersModel->findAll();
       
        // On envoie à la vue
        
        
        $this->render('categories/sport', compact('category','task','tasks','user'),'layout');
    }
    
}    