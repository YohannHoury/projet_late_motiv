<?php

class LoginController
{
    public function index()
    {
    $pm = new PageManager();
    $pages = $pm->getPageByRoute('login');
    require 'templates/layout.phtml';
    }
}