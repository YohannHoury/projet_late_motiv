<?php

class RegistrationController
{
    public function index()
    {
    $pm = new PageManager();
    $pages = $pm->getPageByRoute('registration');
    require 'templates/layout.phtml';
    }
}