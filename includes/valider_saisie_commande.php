<?php

echo "yes!!!! I am in";
if (isset($_POST['nombre-personne-saisi'])){
    $nbre_personne_saisi = $_POST['nombre-personne-saisi'];
    echo "'le nombre saisi est '.$nbre_personne_saisi'";

    if (filter_var($nbre_personne_saisi, FILTER_VALIDATE_INT)!==FALSE){
        if ($nbre_personne_saisi < $nbre_personne_min){
            echo "le minimum est de ".$nbre_personne_min." personnes";
        };}}
?>