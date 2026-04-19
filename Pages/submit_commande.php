<?php
session_start();
// d'abord, vérifier si l'utilisateur est bien connecté, sinon redirection vers la page de connexion
if(!isset($_SESSION['email'])){
    ?>
    <script>window.location.replace("http:./connexion.php");</script>
    <?php
};
echo 'session ok '.$_SESSION['email'];
echo "yes!!!! I am in";
$erreur_de_saisie = FALSE;

if (!isset($_POST['nombre-personne-saisi'])){
    echo "error post";
    $erreur_de_saisie = TRUE;
    } else {
    $nbre_personne_saisi = $_POST['nombre-personne-saisi'];
    $nbre_personne_min = $_POST['nombre-personne-min'];
    $prix_ppersonne = $_POST['prix-ppersonne'];
    echo "le nombre saisi est ". $nbre_personne_saisi;
    echo "le nombre min est ". $nbre_personne_min;
    echo "le prix par personne est ". $prix_ppersonne;
    };

if (filter_var($nbre_personne_saisi, FILTER_VALIDATE_INT)===FALSE){
    echo "not an integer";
    $erreur_de_saisie = TRUE;
    } else {
        if ($nbre_personne_saisi < $nbre_personne_min){
            echo "le minimum est de ".$nbre_personne_min." personnes";
            $erreur_de_saisie = TRUE;
        };};
if ($erreur_de_saisie) {
    ?>
    <script>window.location.replace("http:./passerCommande.php");</script>
    <?php
}
echo "c'est validé";
$montant =   $nbre_personne_saisi * $prix_ppersonne;
echo "le montant est " . $montant;

    
         

/*
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 

$postData = $_POST;

if (
    !isset($postData['email'])
    || !filter_var($postData['email'], FILTER_VALIDATE_EMAIL)
    || empty($postData['message'])
    || trim($postData['message']) === ''
) {
    echo('Il faut un email et un message valides pour soumettre le formulaire.');
    return;
}
    */

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vite et Gourmand - Commande validée</title>
    
</head>
<body>
     <?php
// *************************** le header **************************
require_once (__DIR__."/../includes/header.php");
?>
    <div class="wrapper">

        <h1>Message bien reçu !</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Rappel de vos informations</h5>
                <p class="card-text"><b>Email</b> : <?php echo($_SESSION['email']); ?></p>
                <p class="card-text"><b>Message</b> : <?php echo "wait and see" /*(strip_tags($postData['message']));*/ ?></p>
            </div>
        </div>
    </div>

<?php
require_once (__DIR__."/../includes/footer.php");
?>
</body>
</html>