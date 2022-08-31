<?php

class HomeController
{
    public function index(array $post)
    {
        $pm = new PageManager();
        $pages = $pm->getPageByRoute('todolist');
        require 'templates/layout.phtml';
    }
}