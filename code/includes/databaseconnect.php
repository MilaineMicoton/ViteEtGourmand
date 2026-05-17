<?php
$servername = "db";
$username = "user";
$password = "costaud123";
$dbname = "viteetgourmand";
try {
    $mysqlClient = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $exception) {
    echo "connexion error";

    die('Erreur : ' . $exception->getMessage());}
