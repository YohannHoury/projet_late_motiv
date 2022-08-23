<?php

function getPdo():PDO{
    try {
                    $user = "yohannhoury";
                    $pass = '40347cba18f8c6405e376f555da73be9';
                     $options =
                    [
                        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ];   
                    $pdo = new PDO('mysql:host=db.3wa.io;port=3306;dbname=yohannhoury_late_motiv_app', $user, $pass, $options);
                   
                    return $pdo;
                    
                } catch (PDOException $e) {
                    throw new PDOException($e->getMessage(), (int)$e->getCode()); 
                    die();
                }

    
}
                
                
                
                
?>