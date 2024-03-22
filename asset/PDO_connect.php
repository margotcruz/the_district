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
        echo "Connecté avec succès à la base de données";

        return $conn;

    } catch(PDOException $e) {
        echo "Erreur de connexion à la base de données: " . $e->getMessage();
    }
}


$conn = connect_database();

                                                //CATEGORIES

$affichageCategorie_index = $conn->prepare("SELECT *
                                        FROM categorie
                                        LIMIT 6; ");
$affichageCategorie_index->execute();
$categories_index = $affichageCategorie_index->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "categorie");


$affichage_toutes_categories = $conn->prepare("SELECT *
                                                FROM categorie");
$affichage_toutes_categories->execute();
$toute_categories = $affichage_toutes_categories->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "categorie");



                                                //PLATS


$affichage_plats_vedettes = $conn->prepare("SELECT plat.libelle, plat.image, plat.prix, plat.description, 
                                            SUM(commande.quantite_plat) AS total_vendu
                                            FROM plat 
                                            JOIN commande  ON plat.id = commande.id_plat
                                            GROUP BY plat.libelle
                                            ORDER BY total_vendu DESC
                                            LIMIT 3;");
$affichage_plats_vedettes->execute();
$plat_vedettes = $affichage_plats_vedettes->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "plat");



if (isset($_GET['id'])) {
    $plat_vedette_par_categorie = $conn->prepare("SELECT plat.libelle, plat.image, plat.prix, plat.description, 
                                          SUM(commande.quantite_plat) AS total_vendu
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
    $affichage_plats_vedettes->execute();
}

if (isset($_GET['id'])) {
    $plat_par_categorie = $conn->prepare("SELECT plat.libelle, plat.image, plat.prix, plat.description, 
                                          SUM(commande.quantite_plat) AS total_vendu
                                          FROM plat 
                                          JOIN categorie  ON plat.id_categorie = categorie.id
                                          JOIN commande  ON plat.id = commande.id_plat
                                          WHERE categorie.id = ?
                                          GROUP BY plat.libelle
                                          ORDER BY total_vendu DESC");
    $plat_par_categorie->execute(array($_GET["id"])); 
    $plat_par_cat = $plat_par_categorie->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "plat");
} else {
   $affichage_des_plats = $conn->prepare("SELECT plat.libelle, plat.image, plat.prix, plat.description
                                            FROM plat");
    $affichage_des_plats->execute();
    $affichage_plat= $affichage_des_plats->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "plat");
}


                                                    //ENTREES


if (isset($_GET['id'])) {
    $entree_vedette_par_categorie = $conn->prepare("SELECT entree.libelle, entree.image, entree.prix, entree.description, 
                                          SUM(commande.quantite_entree) AS total_vendu
                                          FROM entree 
                                          JOIN categorie  ON entree.id_categorie = categorie.id
                                          JOIN commande  ON entree.id = commande.id_entree
                                          WHERE categorie.id = ?
                                          GROUP BY entree.libelle
                                          ORDER BY total_vendu DESC
                                          LIMIT 2;");
    $entree_vedette_par_categorie->execute(array($_GET["id"])); 
    $entree_vedette_categorie = $entree_vedette_par_categorie->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "entree");
} else {
    $les_entrees_vedettes = $conn->prepare("SELECT entree.libelle, entree.image, entree.prix, entree.description, 
                                            SUM(commande.quantite_entree) AS total_vendu
                                            FROM entree 
                                            JOIN commande  ON entree.id = commande.id_entree
                                            GROUP BY entree.libelle
                                          ORDER BY total_vendu DESC
                                          LIMIT 2;");
$les_entrees_vedettes->execute();
$entree_vedettes = $les_entrees_vedettes ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "entree");
}



if (isset($_GET['id'])) {
    $entree_par_categorie = $conn->prepare("SELECT entree.libelle, entree.image, entree.prix, entree.description, 
                                          SUM(commande.quantite_entree) AS total_vendu
                                          FROM entree 
                                          JOIN categorie  ON entree.id_categorie = categorie.id
                                          JOIN commande  ON entree.id = commande.id_entree
                                          WHERE categorie.id = ?
                                          GROUP BY entree.libelle
                                          ORDER BY total_vendu DESC");
    $entree_par_categorie->execute(array($_GET["id"])); 
    $entree_categorie = $entree_par_categorie->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "entree");
} else {
    $affichage_des_entree = $conn->prepare("SELECT entree.libelle, entree.image, entree.prix, entree.description
                                        FROM entree");
    $affichage_des_entree ->execute();
    $affichage_entree = $affichage_des_entree->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "entree");
}









    $dessert_vedette = $conn->prepare("SELECT dessert.libelle, dessert.image, dessert.prix, dessert.description,
                                                    SUM(commande.quantite_dessert) AS total_vendu
                                                    FROM dessert
                                                    JOIN commande ON dessert.id = commande.id_dessert
                                                    GROUP BY dessert.libelle
                                                    ORDER BY total_vendu
                                                    LIMIT 2;");
    $dessert_vedette->execute();
    $dessertVedette = $dessert_vedette->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "dessert");



    $affichagedesdessert = $conn->prepare("SELECT dessert.libelle, dessert.image, dessert.prix, dessert.description,
                                                    SUM(commande.quantite_dessert) AS total_vendu
                                                    FROM dessert
                                                    JOIN commande ON dessert.id = commande.id_dessert
                                                    GROUP BY dessert.libelle
                                                    ORDER BY total_vendu");
    $affichagedesdessert->execute();
    $affichagedessert = $affichagedesdessert->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "dessert");

       
       


                                                        //SEARCH

    
?>