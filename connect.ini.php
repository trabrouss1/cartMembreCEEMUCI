<?php
try{
    $dsn = 'mysql:host=localhost;dbname=carte;charset=utf8';
    $bdd = new PDO($dsn,'admin', 'admin');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}catch(PDOException $e){
    echo "Erreur lors de la connexion de la base de donnee :" . $e->getMessage(). '<br>';
    die();
}