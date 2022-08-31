<?php

    class ContactController
    {
      public function index()
      {
        $pm = new PageManager();
        $pages = $pm->getPageByRoute('contact');
        require 'templates/layout.phtml';
      }  
    }