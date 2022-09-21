<?php
    //Connection à la BDD
    $servername = 'localhost:3307';
    $username = 'nyu';
    $password = 'nyu';
    
    //On essaie de se connecter
    try{
        $MySQL = new PDO("mysql:host=$servername;dbname=projetssi", $username, $password);
        //On définit le mode d'erreur de PDO sur Exception
        $MySQL->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    /*On capture les exceptions si une exception est lancée et on affiche
        *les informations relatives à celle-ci*/
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }

    //Session
    session_start();
    define("RACINE","/projetssi/");

    //Variables
    $contenu='';

    //Inclusion
    require_once("fonction.inc.php");
?>
