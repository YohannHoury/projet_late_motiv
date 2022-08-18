<?php
$pdo = new PDO ("mysql:host=db.3wa.io;port=3306;dbname=yohannhoury_late_motiv_app;charset=utf8",
                "yohannhoury","40347cba18f8c6405e376f555da73be9");
$result = $pdo->prepare('SELECT * FROM pages');
$result->execute();
$sql = $result->fetch(PDO::FETCH_ASSOC);

