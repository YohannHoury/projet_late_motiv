<?php

require_once './config/DataBase.php';



function getAllPagesRoute() :?array
{
    $pdo = getPdo();
    $query = $pdo->prepare('SELECT route FROM pages');
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_DEFAULT);

    return $results;
}

function getPageByRoute(string $route = "home") :?array 
{
    $pdo = getPdo();
    $query = $pdo->prepare('SELECT * FROM pages WHERE pages.route = :route');
    $parameters = [
        'route' => $route
    ];
    $query->execute($parameters);
    $result = $query->fetch(PDO::FETCH_DEFAULT);
    
    return $result;
}
