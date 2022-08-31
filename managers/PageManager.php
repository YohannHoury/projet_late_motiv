<?php

class PageManager extends DataBase
{
    
   public function getAllPagesRoute() :?array
    { 
        $query =$this->bdd->prepare('SELECT route FROM pages');
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
    
        return $results;
    }

    public function getPageByRoute(string $route = "home"):?array
    {
        $query = $this->bdd->prepare('SELECT * FROM pages WHERE pages.route =:route');
        $parameters = [
            'route' => $route
        ];
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
        return $result;
        }
}       
$pm = new PageManager();
return $pm;