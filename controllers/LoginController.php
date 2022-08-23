<?php

class LoginController
{
    public function login()
    {
    $pages = getPageByRoute('login');
    require "./templates/layout.phtml";   
    }
}