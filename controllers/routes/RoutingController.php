<?php

//je crée la classe RoutingController
class RoutingController
{
    private PageManager $pgmngr;
    
    function __construct(){
        $this->pgmngr = new PageManager();
    }
}