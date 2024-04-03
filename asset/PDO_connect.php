<?php

require_once('POO/POO_categorie.php');
require_once('POO/POO_plat.php');
require_once('POO/POO_entree.php');
require_once('POO/POO_dessert.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

function connect_database() {
    $servername = "localhost";
    $username = "admin";
    $password = "Afpa1234";
    $dbname = "Projet_fil_rouge";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;

    } catch(PDOException $e) {
        echo "Erreur de connexion à la base de données: " . $e->getMessage();
    }
}  
?>