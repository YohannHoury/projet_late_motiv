<?php

class HomeController
{
    public function index()
    {
        $pm = new PageManager();
        $pages = $pm->getPageByRoute();
        require 'templates/layout.phtml';
    }
}


