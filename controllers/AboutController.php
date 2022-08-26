<?php

    class AboutController
    {
      public function show()
      {
        $pages = getPageByRoute("about");
        require "./templates/layout.phtml";
      }  
    }