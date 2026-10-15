<?php
session_start();
//----------------- insérer la nouvelle commande dans la db-----------


// d'abord se connecter à la db
require_once(__DIR__ . '/../config/mysql.php');
require_once(__DIR__ . '/../includes/databaseconnect.php');

/* puis on écrit la commande dans la db */
$utilisateurID = $_SESSION['utilisateurID'];
$choixMenuId = $_POST['choix-MenuId'];
$dateLivraison = $_POST['date-livraison'];
$heureLivraison = $_POST['heure-livraison'];
$prixMenu = $_POST['choix-PrixParPersonne'];
$nombrePersonne = $_POST['nombre-personne-saisi'];
$precisionComplementaire = $_POST["message-complementaire"];
$statut = $_POST['statut-commande'];

$sqlInsert = "INSERT INTO commande (`utilisateur_id`, `menu_id`, `date_livraison`, 
             `heure_livraison`, `prix_menu`, `nombre_personne`, `precision_complement`, `statut`) 
             VALUES ('$utilisateurID', '$choixMenuId', '$dateLivraison', '$heureLivraison', 
             '$prixMenu','$nombrePersonne', '$precisionComplementaire', '$statut')";

$mysqlClient->exec($sqlInsert);
    
