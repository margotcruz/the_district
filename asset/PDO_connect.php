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
    $dbname = "projet_fil_rouge";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connecté avec succès à la base de données";

        return $conn;

    } catch(PDOException $e) {
        echo "Erreur de connexion à la base de données: " . $e->getMessage();
    }
}


$conn = connect_database();

// Récupération des catégories

$affichageCategorie_index = $conn->prepare("SELECT *
                                        FROM categorie
                                        LIMIT 6; ");
$affichageCategorie_index->execute();
$categories_index = $affichageCategorie_index->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "categorie");


$affichage_toutes_categories = $conn->prepare("SELECT *
                                                FROM categorie");
$affichage_toutes_categories->execute();
$toute_categories = $affichage_toutes_categories->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "categorie");

// Récupération des plats

$affichage_plats_vedettes = $conn->prepare("SELECT p.libelle, p.image, p.prix, p.description, 
                                            SUM(c.quantite) AS total_vendu
                                            FROM plat p
                                            JOIN commande c ON p.id = c.id_plat
                                            GROUP BY p.libelle
                                            ORDER BY total_vendu DESC
                                            LIMIT 3;");
$affichage_plats_vedettes->execute();
$plat_vedettes = $affichage_plats_vedettes->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "plat");


// Récupération  par catégorie
if (isset($_GET['id'])) {
    $plat_vedette_par_categorie = $conn->prepare("SELECT plat.libelle, plat.image, plat.prix, plat.description, 
                                          SUM(commande.quantite) AS total_vendu
                                          FROM plat 
                                          JOIN categorie  ON plat.id_categorie = categorie.id
                                          JOIN commande  ON plat.id = commande.id_plat
                                          WHERE categorie.id = ?
                                          GROUP BY plat.libelle
                                          ORDER BY total_vendu DESC
                                          LIMIT 3;");
    $plat_vedette_par_categorie->execute(array($_GET["id"])); 
    $plat_vedette_categorie = $plat_vedette_par_categorie->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "plat");
} else {
    echo 'Aucun ID sélectionné';
    $platCategorie = array(); 
}


if (isset($_GET['id'])) {
    $plat_vedette_par_categorie = $conn->prepare("SELECT entree.libelle, entree.image, entree.prix, entree.description, 
                                          SUM(commande.quantite) AS total_vendu
                                          FROM entree 
                                          JOIN categorie  ON entree.id_categorie = categorie.id
                                          JOIN commande  ON entree.id = commande.id_entree
                                          WHERE categorie.id = ?
                                          GROUP BY entree.libelle
                                          ORDER BY total_vendu DESC
                                          LIMIT 3;");
    $entree_vedette_par_categorie->execute(array($_GET["id"])); 
    $entree_vedette_categorie = $entree_vedette_par_categorie->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "entree");
} else {
    echo 'Aucun ID sélectionné';
    $entreeCategorie = array(); 
}

      
        
       

?>