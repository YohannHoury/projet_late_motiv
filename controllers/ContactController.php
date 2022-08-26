<?php

    class ContactController
    {
      public function address()
      {
        $pages = getPageByRoute("contact");
        require "./templates/layout.phtml";
      }  
    }