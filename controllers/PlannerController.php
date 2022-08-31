<?php

class PlannerController
{
    public function index(array $post)
    {
        $pm = new PageManager();
        $pages = $pm->getPageByRoute('planner');
        require 'templates/layout.phtml';
    }
}