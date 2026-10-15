<?php
// php pour renvoyer un array des menus à js avec fetch

// d'abord se connecter à la db
require_once(__DIR__ . '/../config/mysql.php');
require_once(__DIR__ . '/../includes/databaseconnect.php');

// ensuite récupérer les données de tous les menus

// ********************ici on  sélectionne toutes les données de la table menu**********
$statement = $mysqlClient->prepare ("SELECT * FROM menu LIMIT 10");
$statement->execute();
$allMenus = $statement->fetchAll(PDO::FETCH_ASSOC);

//print_r(array_values($allMenus));
echo json_encode($allMenus);
