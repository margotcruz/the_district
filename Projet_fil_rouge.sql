CREATE TABLE `categorie` (
  `id` int AUTO_INCREMENT PRIMARY KEY ,
  `libelle` varchar(100) NOT NULL,
  `image_mobile` varchar(255) NOT NULL,
  `image_desktop` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL) ;
 
  
 CREATE TABLE `plat` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `libelle` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_categorie` int NOT NULL,
  FOREIGN KEY (`id_categorie`) REFERENCES categorie(`id`),
  `active` varchar(10) NOT NULL
);

CREATE TABLE `entree` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `libelle` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_categorie` int NOT NULL,
  FOREIGN KEY (`id_categorie`) REFERENCES categorie(`id`),
  `active` varchar(10) NOT NULL
);

CREATE TABLE `boisson` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `libelle` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL
);

 CREATE TABLE `dessert` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `libelle` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL) ;

CREATE TABLE `commande` (
`id` int AUTO_INCREMENT PRIMARY KEY,
`id_dessert` int NOT NULL REFERENCES dessert(id),
`quantite_dessert` int NOT NULL,
`id_entree` int NOT NULL REFERENCES entree(id),
`quantite_entree` int NOT NULL,
`id_plat` int NOT NULL REFERENCES plat(id),
`quantite_plat` int NOT NULL,
`total` decimal(10,2) NOT NULL,
`date_commande` datetime NOT NULL,
`etat` varchar(50) NOT NULL,
`nom_client` varchar(150) NOT NULL,
`telephone_client` varchar(20) NOT NULL,
`email_client` varchar(150) NOT NULL,
`adresse_client` varchar(255) NOT NULL) ;

CREATE TABLE `utilisateur` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `nom_prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL) ;

INSERT INTO `categorie` (`libelle`, `image_mobile`,`image_desktop`, `active`)
VALUES
    ("Asian", "img/categorie/asian-horizontal.png","img/categorie/asian.png", "Yes"),
    ("Pasta", "img/categorie/pasta-horizontal.png","img/categorie/pasta.png", "Yes"),
    ("Pizza", "img/categorie/pizza-horizontal.png","img/categorie/pizza.png", "Yes"),
    ("Salade","img/categorie/salade-horonzital.png","img/categorie/salade.png", "Yes"),
    ("Veggi", "img/categorie/veggi-horizontal.png","img/categorie/veggi.png", "Yes"),
    ("Wrap", "img/categorie/wrap-horizontal.png","img/categorie/wrap.png", "No"),
    ("Burger","img/categorie/burger-horizontal.png","img/categorie/burger.png", "Yes"),
    ("Sandwich","img/categorie/sandwich-horizontal.png","img/categorie/sandwich.png", "Yes");

INSERT INTO `plat` (`libelle`, `description`, `prix`, `image`, `id_categorie`, `active`)
VALUES
    ("Courgettes Farcies🌿", "Des courgettes tendres, généreusement garnies d'un mélange savoureux de quinoa, de légumes frais et d'herbes aromatiques.", 12.99, "img/plats/courgette-farcie.png", 5, "Yes"),
    ("Le burger Angus", "Un savoureux burger composé d'une généreuse portion de bœuf Angus grillée, accompagnée de fromage Gouda fondant.", 12.99, "img/plats/burger-angus.png", 7, "Yes"),
    ("Pizza chorizo", "Notre pâte croustillante est garnie de chorizo épicé, d'olives juteuses, d'oignons rouges savoureux et de poivrons colorés, le tout recouvert d'un fromage fondant.", 16.99, "img/plats/pizza-chorizo.png", 3, "Yes"),
    ("Salade César avec Avocat", "Des feuilles de laitue croquante, du poulet grillé, des croûtons dorés, du parmesan râpé, le tout nappé de notre irrésistible sauce César maison.", 10.99, "img/plats/salade-cesar.png", 4, "Yes"),
    ("Pad Thai aux Crevettes", "Des nouilles de riz sautées dans une sauce au tamarin, des crevettes succulentes.", 12.99, "img/plats/pad-thai-crevette.png", 1, "Yes"),
    ("Riz Cantonais", "Le Riz Cantonais, délicieusement sauté et agrémenté de légumes, de petits pois, d'œufs et de morceaux de viande, est un plat chinois classique.", 9.99, "img/plats/riz-cantonais.png", 1, "Yes");


INSERT INTO `plat` (`libelle`, `description`, `prix`, `image`, `id_categorie`, `active`)
VALUES
    ("Courgettes Farcies🌿", "Des courgettes tendres, généreusement garnies d'un mélange savoureux de quinoa, de légumes frais et d'herbes aromatiques.", 12.99, "img/plats/courgette-farcie.png", 5, "Yes"),
    ("Le burger Angus", "Un savoureux burger composé d'une généreuse portion de bœuf Angus grillée, accompagnée de fromage Gouda fondant.", 12.99, "img/plats/burger-angus.png", 7, "Yes"),
    ("Pizza chorizo", "Notre pâte croustillante est garnie de chorizo épicé, d'olives juteuses, d'oignons rouges savoureux et de poivrons colorés, le tout recouvert d'un fromage fondant.", 16.99, "img/plats/pizza-chorizo.png", 3, "Yes"),
    ("Salade César avec Avocat", "Des feuilles de laitue croquante, du poulet grillé, des croûtons dorés, du parmesan râpé, le tout nappé de notre irrésistible sauce César maison.", 10.99, "img/plats/salade-cesar.png", 4, "Yes"),
    ("Pad Thai aux Crevettes", "Des nouilles de riz sautées dans une sauce au tamarin, des crevettes succulentes.", 12.99, "img/plats/pad-thai-crevette.png", 1, "Yes"),
    ("Riz Cantonais", "Le Riz Cantonais, délicieusement sauté et agrémenté de légumes, de petits pois, d'œufs et de morceaux de viande, est un plat chinois classique.", 9.99, "img/plats/riz-cantonais.png", 1, "Yes");

INSERT INTO `entree` (`libelle`, `description`, `prix`, `image`, `id_categorie`,`active`)
VALUES
    ("Gyoza Délicieux", "Gyoza farcis d'une savoureuse combinaison de viande hachée, de légumes et d'épices.", 9.99, "img/entrées/gyoza.png", 1, "Yes"),
    ("Maki assorti🥢", "Assortiment de makis frais et délicieux, remplis de poisson, de légumes et de riz.", 12.99, "img/entrées/maki.png", 1,"Yes"),
    ("Tempura croustillante", "Tempura légère et croustillante, accompagnée d'une sauce spéciale pour une expérience gustative unique.", 14.99, "img/entrées/tempura.png", 1,"Yes"),
    ("Rouleau de printemps frais", "Rouleau de printemps frais et sain, rempli de légumes croquants et de crevettes, servi avec une sauce légère.", 10.99, "img/entrées/rouleau_de_printemps.png", 1,"Yes"),
    ("Bruschetta pêche feta", "Délicieuse bruschetta avec des morceaux de pêche sucrée et de la feta crémeuse.", 11.99, "img/entrées/brushettas.png", 2,"Yes"),
    ("Bruschetta jambon de Parme burrata", "Bruschetta savoureuse avec du jambon de Parme, de la burrata crémeuse et des tomates fraîches.", 12.99, "img/entrées/brushettas.png", 2,"Yes"),
    ("Bruschetta tomate mozzarella", "Classique bruschetta italienne avec des tomates juteuses et de la mozzarella fondante.", 11.49, "img/entrées/brushettas.png", 2,"Yes");


INSERT INTO `dessert` (`libelle`, `description`, `prix`, `image`,`active`)
VALUES
    ("Cheesecake décadent", "Un cheesecake crémeux avec une croûte de biscuits Graham, garni de fruits frais et d'une délicieuse sauce aux fruits rouges.", 8.99, "img/dessert/cheesecake.png","Yes"),
    ("Milkshake onctueux", "Un milkshake épais et onctueux avec une variété de saveurs de crème glacée, garni de crème fouettée et de pépites de chocolat.", 6.99, "img/dessert/milkshake.png","Yes"),
    ("Tiramisu exquis", "Un tiramisu italien classique, avec des couches de biscuits imbibés de café, de mascarpone crémeux et saupoudré de cacao.", 9.99, "img/dessert/tiramitsu.png","Yes"),
    ("Gâteau de lune moelleux", "Un gâteau de lune moelleux et délicat, fourré de différentes saveurs et décoré avec des motifs festifs.", 7.99, "img/dessert/gateau de lune.png","Yes"),
    ("Glace artisanale", "Des glaces artisanales de qualité dans une variété de parfums exquis, parfaites pour satisfaire votre envie sucrée.", 4.99, "img/dessert/glace.png","Yes"),
    ("Mochi Divin", "Des mochis fourrés au haricot rouge, à la pâte de sésame ou à la glace, offrant une variété de goûts pour satisfaire tous les palais", 1.99, "img/dessert/mochi.png","Yes");


INSERT INTO `commande` (`id_dessert`, `quantite_dessert`, `id_entree`, `quantite_entree`, `id_plat`, `quantite_plat`, `total`, `date_commande`, `etat`, `nom_client`, `telephone_client`, `email_client`, `adresse_client`)
VALUES 
(1, 2, 3, 1, 7, 4, 12.99, "2020-11-30 03:52:43", "Livrée", "Kelly Dillard", "7896547800", "kelly@gmail.com", "308 Post Avenue"),
(4, 3, 6, 1, 10, 2, 21.98, "2020-11-30 04:07:17", "Livrée", "Thomas Gilchrist", "7410001450", "thom@gmail.com", "1277 Sunburst Drive"),
(3, 4, 1, 5, 10, 1, 10.99, "2021-05-04 01:35:34", "Livrée", "Martha Woods", "78540001200", "marthagmail.com", "478 Avenue Street"),
(2, 5, 3, 6, 8, 1, 12.99, "2021-07-20 06:10:37", "Livrée", "Charlie", "7458965550", "charlie@gmail.com", "3140 Bartlett Avenue"),
(6, 2, 5, 3, 9, 2, 33.98, "2021-07-20 06:40:21", "En cours de livraison", "Claudia Hedley", "7451114400", "hedley@gmail.com", "1119 Kinney Street"),
(5, 4, 3, 6, 8, 1, 12.99, "2021-07-20 06:40:57", "En préparation", "Vernon Vargas", "7414744440", "venno@gmail.com", "1234 Hazelwood Avenue"),
(2, 1, 6, 3, 11, 4, 51.96, "2021-07-20 07:06:06", "Annulée", "Carlos Grayson", "7401456980", "carlos@gmail.com", "2969 Hartland Avenue"),
(4, 5, 2, 6, 12, 4, 39.96, "2021-07-20 07:11:06", "Livrée", "Jonathan Caudill", "7410256996", "jonathan@gmail.com", "1959 Limer Street");



