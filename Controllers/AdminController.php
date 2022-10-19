<?php
namespace LateMotivApp\Controllers;

use LateMotivApp\Models\TasksModel;
use LateMotivApp\Models\UsersModel;
use LateMotivApp\Models\CategoriesModel;
use PDOException;

class AdminController extends Controller
{
    public function index()
    {
        // On vérifie si on est admin
        if($this->isAdmin()){
            $this->render('admin/index', [], 'admin');
        }
    }
    
    public function users()
    {
        if($this->isAdmin()){
            $usersModel = new UsersModel;

            $users = $usersModel->findAll();

            $this->render('admin/users', compact('users'), 'admin');
        }
    }
    
    public function deleteUser(int $id)
    {
        if($this->isAdmin()){
            $user = new UsersModel;
            
           
            $user->delete($id);

            header('location:index.php?p=admin/users');
        }
    }
    

    // Affiche la liste des tâches sous forme de tableau
     
    public function tasks()
    {
        if($this->isAdmin()){
            $tasksModel = new TasksModel;
            $categoryModel = new CategoriesModel;
            $userModel = new UsersModel;

            $tasks = $tasksModel->findAll();
            $category = $categoryModel->findAll();
            $user = $userModel->findAll();

            $this->render('admin/tasks', compact('user','category','tasks'), 'admin');
        }
    }

    
    // Supprime une tâche si on est admin
    
     
    public function deleteTask(int $id)
    {
        if($this->isAdmin()){
            $task = new TasksModel;

            $task->delete($id);
            
            

            header('Location: index.php?p=admin/tasks');
        }
    }

    
    //  Active ou désactive une tâche
    
    public function activeTask(int $id)
    {
        if($this->isAdmin()){
            $tasksModel = new TasksModel;

            $taskArray = $tasksModel->find($id);

            if($taskArray){
                $task = $tasksModel->hydrate($taskArray);

                // if($task->getActif()){
                //     $task->setActif(0);
                // }else{
                //     $task->setActif(1);
                // }

                $task->setActive($task->getActive() ? 0 : 1);

                $task->update();
                
                header('Location: index.php?p=admin/tasks');
            }
        }
    }


    
    // Vérifie si on est admin
     
    private function isAdmin()
    {
        // On vérifie si on est connecté avec "ROLE_ADMIN" dans nos rôles
        if(isset($_SESSION['user']) && in_array( '1' , $haystack = [$_SESSION['user']['roles']])){
            // On est admin
            return true;
            header('Location: index.php?p=admin/index');
        }else{
            // On n'est pas admin
            $_SESSION['erreur'] = "Vous n'avez pas accès à cette zone";
            header('Location: index.php?p=users/index');
            exit;
        }
    }

}