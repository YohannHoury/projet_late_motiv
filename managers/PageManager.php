<?php
require "./models/Page.php";

class PageManager
{
    
    function getAllPagesRoutes() : array
    {
        $db;
        $query = $this->db->prepare('SELECT route FROM pages ');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $result;
    }
    
    function getPageByRoute(string $route) : Page
    {
        $db;
        $query = $this->db->prepare('SELECT * FROM pages WHERE pages.route = :route');
        $parameters = [
            'route' => $route
        ];
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
        return new Page($result['id'], $result['route'], $result['title']);
    }
}