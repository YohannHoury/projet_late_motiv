<?php

class AccountController
{
    public function index(array $post)
    {
        $page = getPm();
        $pages = $page->getPageByRoute("account");
        require 'templates/layout.phtml';
    }
}