<?php
namespace LateMotivApp\Controllers;

class MainController extends Controller
{
    public function index()
    {   //page principale de l'application pas d'utilisateur connecté
        $this->render('main/index', [], 'home');
    }
    public function menu()
    {   //page principale de l'application pas d'utilisateur connecté
        $this->render('main/menu', [], 'home');
    }
    public function about()
    {   //page à propos pas d'utilisateur connecté
        $this->render('main/about', [], 'home');
    }
    public function contact()
    {   //page de contact pas d'utilisateur connecté
        $this->render('main/contact', [], 'home');
    }
}