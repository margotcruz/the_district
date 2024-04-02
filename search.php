<?php
require_once('asset/PDO_connect.php');
$conn = connect_database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchTerm = trim($_POST["searchTerm"]);
    if (!empty($searchTerm)) {
        $sql = "SELECT plat.libelle AS plat_libelle, plat.image AS plat_image, plat.description AS plat_description,
                    entree.libelle AS entree_libelle, entree.image AS entree_image, 
                    dessert.libelle AS dessert_libelle, dessert.image AS dessert_image, 
                    categorie.libelle AS categorie_libelle, categorie.image_mobile AS categorie_image
                FROM categorie
                LEFT JOIN plat ON plat.id_categorie = categorie.id
                LEFT JOIN entree ON entree.id_categorie = categorie.id
                LEFT JOIN dessert ON 1=1 -- Une condition toujours vraie pour inclure la table dessert
                WHERE plat.libelle LIKE :searchTerm
                    OR entree.libelle LIKE :searchTerm
                    OR dessert.libelle LIKE :searchTerm
                    OR categorie.libelle LIKE :searchTerm";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Créer un tableau pour stocker les plats uniques
        $uniquePlats = array();
        
        foreach ($results as $result) {
            $platLibelle = $result['plat_libelle'];
            if (!isset($uniquePlats[$platLibelle])) {
                // Ajouter le plat aux résultats uniques
                $uniquePlats[$platLibelle] = $result;
            }
        }

        // Afficher les résultats uniques
        foreach ($uniquePlats as $plat) {
            echo ' 
            <div class="card">
                <img src="'. $plat['plat_image'] .'" alt="' . $plat['plat_libelle'] . '">
                <div class="card-details">
                    <p>' . $plat['plat_libelle'] . '</p>
                    <p>' . $plat['plat_description'] . '</p>
                    <button>Commander</button>
                </div>
            </div>
            ';

            // Afficher les détails de la catégorie
            echo ' 
            <div class="card">
                <img src="'. $plat['categorie_image'] .'" alt="' . $plat['categorie_libelle'] . '">
                <div class="card-details">
                    <button>Commander</button>
                </div>
            </div>
            ';
        }
    } else {
        echo "Veuillez entrer un terme de recherche.";
    }
}
?>
