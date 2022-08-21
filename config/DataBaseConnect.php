<?php //DataBaseConnect.php

//connexion à la base de données de l'appication
    $host = 'db.3wa.io';
    $data = 'yohannhoury_late_motiv_app';
    $user = 'yohannhoury';
    $pass = '40347cba18f8c6405e376f555da73be9';
    $chrs = 'utf8mb4';
    $attr = "mysql:host=$host;dbname=$data;charset=$chrs";
    $opts =
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
 ?>
   

