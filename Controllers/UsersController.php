<?php
namespace LateMotivApp\Controllers;

use LateMotivApp\Core\Form;
use LateMotivApp\Models\TasksModel;
use LateMotivApp\Models\UsersModel;
use LateMotivApp\Models\CategoriesModel;
use PDOException;

class UsersController extends Controller
{
    //Connexion utilisateurs
    public function index()
    {
        // On vérifie si on est connecté
        if($this->isLogged()){
            $this->render('users/index', [], 'layout');
        }
    }

    public function login(){
        // On vérifie si le formulaire est complet
        if(Form::validate($_POST, ['username', 'password'])){
            // Le formulaire est complet
            // On va chercher dans la base de données l'utilisateur avec son pseudo
            $usersModel = new UsersModel;
            $userArray = $usersModel->findOneByUsername(htmlentities($_POST['username']));

            // Si l'utilisateur n'existe pas
            if(!$userArray){
                // On envoie un message de session
                $_SESSION['erreur'] = 'Le nom d\'utilisateur et/ou le mot de passe est incorrect';
                header('Location: /users/login');
                exit;
            }

            // L'utilisateur existe
            $user = $usersModel->hydrate($userArray);

            // On vérifie si le mot de passe est correct
            if(password_verify($_POST['password'], $user->getPassword())){
                // Le mot de passe est bon
                // On crée la session
                $user->setSession();
                header('Location: index.php?p=users/index');
                exit;
            }else{
                // Mauvais mot de passe
                $_SESSION['erreur'] = 'Le nom d\'utilisateur et/ou le mot de passe est incorrect';
                header('Location: index.php?p=users/login');
                exit;
            }

        }
        
        $this->render('users/login', [],'home');
       
    }

    
    // Inscription utilisateurs
    
    public function register()
    {
        // On vérifie si le formulaire est valide
        if(Form::validate($_POST, ['username','email', 'password'])){
            // Le formulaire est valide

            // On nettoie avec strip_tags le $_POST['username']
            $username = htmlentities($_POST['username']);
            // On "nettoie" l'adresse email
            $email = filter_var($_POST['email']);

            // On chiffre le mot de passe
            $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
            
            
            
            // On hydrate l'utilisateur
            
            $user = new UsersModel;
           
            $user->setUsername($username)
                ->setEmail($email)
                ->setPassword($pass)
                ->setRoles('0');

            // On stocke l'utilisateur
            $user->create();
        }

        $this->render('users/register', [],'home');
    }
    
    
    public function deleteTask(int $id)
    {
        if($this->isLogged()){
            $task = new TasksModel;

            $task->delete($id);
            
            

            header('Location: index.php?p=users/index');
        }
    }

    
    //  Active ou désactive une tâche
    
    public function activeTask(int $id)
    {
        if($this->isLogged()){
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
                
                header('Location: index.php?p=users/index');
            }
        }
    }
    
    public function isLogged()
    {
        // On vérifie si on est connecté avec "ROLE_USER" dans nos rôles
        if(isset($_SESSION['user']) && in_array( '0' , [$_SESSION['user']['roles']])|| in_array( '1' ,[$_SESSION['user']['roles']])){
            // On est reconnu avec droit utilisateur
            return true;
            header('Location:index.php?p=users');
        }else{
            // On n'est pas inscrit
            $_SESSION['erreur'] = "Vous n'avez pas accès à cette zone";
            header('Location: index.php?p=users/register');
            exit;
        }
    }
    
    
    // Déconnexion de l'utilisateur
   
    public function logout(){
        unset($_SESSION['user']);
        header('Location: index.php?p=main/index');
        exit;
    }

}