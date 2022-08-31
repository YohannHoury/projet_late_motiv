<?php

    class AboutController
    {
      public function index()
      {
        $pm = new PageManager();
        $pages = $pm->getPageByRoute('about');
        require 'templates/layout.phtml';
      }  
    }