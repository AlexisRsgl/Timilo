<?php 
    try 
    {
        $bdd = new PDO("mysql:host=localhost;dbname=timilo;charset=utf8", "root", "toor");
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }