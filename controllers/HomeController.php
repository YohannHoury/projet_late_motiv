<?php

class HomeController
{
    public function index()
    {
        $infos = PageManager->getPageByRoute();
        require "./templates/layout.phtml";
    }
}
