<?php

require_once('asset/PDO_connect.php');
$conn = connect_database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchTerm = trim($_POST["searchTerm"]);
    if (!empty($searchTerm)) {
        $sql = "SELECT plat.libelle AS plat_libelle, plat.image AS plat_image, plat.description AS plat_description,
                    entree.libelle AS entree_libelle, entree.image AS entree_image, 
                    dessert.libelle AS dessert_libelle, dessert.image AS dessert_image, 
                    categorie.id AS id_categorie, categorie.libelle AS categorie_libelle, categorie.image_mobile AS categorie_image
                FROM categorie
                LEFT JOIN plat ON plat.id_categorie = categorie.id
                LEFT JOIN entree ON entree.id_categorie = categorie.id
                LEFT JOIN dessert ON plat.id_categorie = categorie.id
                WHERE plat.libelle LIKE :searchTerm
                    OR entree.libelle LIKE :searchTerm
                    OR dessert.libelle LIKE :searchTerm
                    OR categorie.libelle LIKE :searchTerm";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Créer un tableau pour stocker les résultats uniques
        $uniqueResults = array();

        // Parcourir les résultats
        foreach ($results as $result) {
            // Vérifier si le plat est unique et correspond à la recherche
            if (!empty($result['plat_libelle']) && stripos($result['plat_libelle'], $searchTerm) !== false && !isset($uniqueResults[$result['plat_libelle']])) {
                $uniqueResults[$result['plat_libelle']] = $result;
                echo ' 
                <div class="card">
                    <img src="'. $result['plat_image'] .'" alt="' . $result['plat_libelle'] . '">
                    <div class="card-details">
                        <p>' . $result['plat_libelle'] . '</p>
                        <p>' . $result['plat_description'] . '</p>
                        <button>Commander</button>
                    </div>
                </div>

                <div class="card">
                    <img src="'. $result['categorie_image'] .'" alt="' . $result['categorie_libelle'] . '">
                    <div class="card-details">
                        <p>' . $result['categorie_libelle'] . '</p>
                        <button><a href="menu.php?id=' . $result['id_categorie'] . '">Afficher plus de la categorie ' . $result['categorie_libelle'] . '</a></button>
                    </div>
                </div>
                ';
            }

            // Vérifier si l'entrée est unique et correspond à la recherche
            if (!empty($result['entree_libelle']) && stripos($result['entree_libelle'], $searchTerm) !== false && !isset($uniqueResults[$result['entree_libelle']])) {
                $uniqueResults[$result['entree_libelle']] = $result;
                echo ' 
                <div class="card">
                    <img src="'. $result['entree_image'] .'" alt="' . $result['entree_libelle'] . '">
                    <div class="card-details">
                        <p>' . $result['entree_libelle'] . '</p>
                        <button>Commander</button>
                    </div>
                </div>

                <div class="card">
                    <img src="'. $result['categorie_image'] .'" alt="' . $result['categorie_libelle'] . '">
                    <div class="card-details">
                        <p>' . $result['categorie_libelle'] . '</p>
                        <button><a href="menu.php?id=' . $result['id_categorie'] . '">Afficher plus de la categorie ' . $result['categorie_libelle'] . '</a></button>
                    </div>
                </div>
                ';
            }

            // Vérifier si le dessert est unique et correspond à la recherche
            if (!empty($result['dessert_libelle']) && stripos($result['dessert_libelle'], $searchTerm) !== false && !isset($uniqueResults[$result['dessert_libelle']])) {
                $uniqueResults[$result['dessert_libelle']] = $result;
                echo ' 
                <div class="card">
                    <img src="'. $result['dessert_image'] .'" alt="' . $result['dessert_libelle'] . '">
                    <div class="card-details">
                        <p>' . $result['dessert_libelle'] . '</p>
                        <button>Commander</button>
                    </div>
                </div>
                ';
            }
        }

        // Si aucun résultat correspondant à la recherche n'est trouvé
        if (empty($uniqueResults)) {
            echo "Aucun résultat trouvé.";
        }
    } else {
        echo "Veuillez entrer un terme de recherche.";
    }
}

?>
