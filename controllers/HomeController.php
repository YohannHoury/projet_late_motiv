<?php
class HomeController
{
    
    public function index()
    {   
        $pages = getPageByRoute();
        require "./templates/layout.phtml";
    }
}


