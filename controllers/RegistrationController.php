<?php

class RegistrationController
{
    public function Entry()
    {
    $pages = getPageByRoute('registration');
    require "./templates/layout.phtml";  
    }
}