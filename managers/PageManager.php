<?php
    
    class PageManager
    {
        private $connect;
        private $results;
        private $result;
         
         public function __construct()
        {
        $this->connect = new Database();
        $this->connect = $this->connect->getBdd();
        }
   
        function getAllPagesRoutes() :?array
        {
           
            
            $query = $this->connect->prepare('SELECT route FROM page');
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
        
            return $results;
        }

        function getPageByRoute(string $route = "home") :?array 
        {
            
            
            $query =  $this->connect->prepare('SELECT * FROM page WHERE page.route = :route');
            $parameters = [
                'route' => $route
            ];
            $query->execute($parameters);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            
            return $result;
        }
 }