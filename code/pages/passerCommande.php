<?php
session_start();
echo '<p style="position: absolute; z-index: -99;">&nbsp</p>';
// d'abord, vérifier si l'utilisateur est bien connecté, sinon redirection vers la page de connexion
if(!isset($_SESSION['email'])){
    ?>
    <script>window.location.replace("http:./connexion.php");</script>
    <?php
};
/* debugging time!!
/*if(isset($_SESSION['utilisateurID'])){
    echo "<br>Voici le contenu session : ";  
    echo "<br>identifiant utilisateur = " . $_SESSION['utilisateurID'];
    echo "<br>  email utilisateur = " . $_SESSION['email'];
    echo "<br>  statut commande = " . $_SESSION['statutCommande'];
    echo "<br> menu id = " . $_SESSION['choixMenuId'];
/*} else {echo "erreur id est absent de session";};*/
require_once(__DIR__ . '/../includes/databaseconnect.php');

// on récupère le statut de la commande

if(isset($_POST['statutCommande'])){
    $statutCommande  = $_POST['statutCommande'];
    } else {
    $statutCommande  = $_SESSION['statutCommande'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Vite & Gourmand</title>
    
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/home.css">
    <link rel="stylesheet" href="../CSS/commandes.css">

<!-- empty data URI to prevent the browser from getting the favicon file and showing 404-->
    <link rel="icon" href="data;,">

<!-- lancer script js de validation des saisies 
    <script src="valider_saisie_commande.js" defer></script> -->
</head>
<body>

  <?php
require_once (__DIR__."/../includes/header.php");
?>

<main>

<h1>Votre nouvelle commande</h1>

<div class="wrapper-commande">
    <div class="cadre-menu">
        <!-- ici on reproduit le cadre du menu sans le bouton commander -->
        <?php 
        if (isset($_POST['choixTitre'])){
            $_SESSION ['choixTitre'] = $_POST['choixTitre'];
            $_SESSION ['choixSousTitre'] = $_POST['choixSousTitre'];
            $_SESSION ['choixLigne1'] = $_POST['choixLigne1'];
            $_SESSION ['choixLigne2'] = $_POST['choixLigne2'];
            $_SESSION ['choixLigne3'] = $_POST['choixLigne3'];
            $_SESSION ['choixLigne4'] = $_POST['choixLigne4'];
            $_SESSION ['choixLigne5'] = $_POST['choixLigne5'];
            $_SESSION ['choixImage']  = '<img src="'.$_POST['choixImage'].'" alt="Menu classique">';
            $_SESSION ['choixPrixParPersonne'] = $_POST['choixPrixParPersonne'];
            $_SESSION ['choixNbrePersonneMin'] = $_POST['choixNbrePersonneMin'];
            $_SESSION['choixImage'] = $_POST['choixImage'];
            $_SESSION['choixMenuId'] = $_POST['choixMenuId'];
            }
        echo '<img src="'.$_SESSION['choixImage'].'" alt="Menu classique">';
        ?>
        <article>
            <h2><?php echo $_SESSION['choixTitre']; ?></h2><br>
            <p><?php echo $_SESSION['choixSousTitre']; ?><br><br>
            <?php echo $_SESSION['choixLigne1']; ?><br>
            <?php echo $_SESSION['choixLigne2'];?><br>
            <?php echo $_SESSION['choixLigne3']; ?><br>
            <?php echo $_SESSION['choixLigne4']; ?><br>
            <?php echo $_SESSION['choixLigne5']; ?></p>
            <br>

        </article>
            
         <p class="prix">par personne: <?php echo $_SESSION['choixPrixParPersonne'] ?>€</p>
         <p class="min">Nombre minimum de personnes: <?php echo $_SESSION['choixNbrePersonneMin'] ?></p>
        
    </div>
    <div class="cadre-commande">
    <form  method="POST" action="passerCommande.php">
            <h2> Complétez votre commande</h2>
            <br>
            <div class="div-mail">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" readonly="readonly" value="<?php echo $_SESSION['email'];?>">
            </div>
            <br>
            <h3>La livraison</h3>
            <br>
            <div class="div-date-livraison">
                <label for="date-livraison" class="form-label">Date&nbsp&nbsp</label>
                <input type="date" placeholder="date de demain" id="date-livraison" name="date-livraison" required
                    value = <?php if (isset($_POST['date-livraison'])){echo $_POST['date-livraison'];}?>>
            </div>
            <div class="div-heure-livraison">
                <label for="heure-livraison"  class="form-label">Heure</label>
                <input type="time" placeholder="heure de livraison" id="heure-livraison" name="heure-livraison" required 
                value = <?php if (isset($_POST['heure-livraison'])){echo $_POST['heure-livraison'];}?>>
            </div>
            <br>
            <h3>Pour combien de personnes?</h3>
            <div class="div-nombre-personne">
                <label for="div-nombre-personne" class="form-label">Nombre de couverts</label>
                <input type="number" placeholder= "veuillez entrer un nombre"  id="nombre-personne-saisi" name="nombre-personne-saisi" required 
                value = <?php if (isset($_POST['nombre-personne-saisi'])){echo $_POST['nombre-personne-saisi'];}?>>
            </div>
            <?php
            if (isset($_POST['nombre-personne-saisi'])){
                if ($_POST['nombre-personne-saisi'] < $_SESSION ['choixNbrePersonneMin']){
                    echo ' <style>h4{color:red;} </style>';?>
                    <h4>Il y a un minimum de couverts pour ce menu</h4>
                    <?php }}?>
            <br>
            <h3>Montant à régler</h3>
            <div class="div-montant-commande">
                <label for="montant-commande" class="montant-commande">Total commande&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                <input type="number" placeholder="en attente de calcul" id="montant-commande" name="montant-commande" readonly="readonly"     
                value = <?php if (isset($_POST['nombre-personne-saisi'])){echo $_POST['nombre-personne-saisi'] * $_SESSION['choixPrixParPersonne'];}?>>
            </div>
            <br>
            <div class="div-message-complementaire">
                <label for="message-complementaire" class="form-label">Précisions complémentaires</label>
                <textarea id="message-complementaire" name="message-complementaire" rows="3" cols="1" placeholder= "Précisions sur ma livraison..."
                ><?php if (isset($_POST['message-complementaire'])){echo $_POST['message-complementaire'];};?></textarea>
            </div>
            <br>
            <div class="bouton-valider">
                <button type="submit" class="bouton-valider">Valider</button>
            </div>
            <br>
            <div class = "retour-utilisateur">
                <p> <?php echo $statutCommande; ?></p>
            </div>
            <!-------- enlever ceci ? 
            <br>
            <div class="div-statut">
                <label for="div-statut" class="form-label">Statut commande&nbsp&nbsp&nbsp&nbsp</label>
                <input type="text" id="statut" name="statut" readonly="readonly" value = "<?php /*echo "statut = " . $statutCommande;*/?>">
            </div>
                 ---->
    </form>
    </div>

</div>

</main>

<?php
require_once (__DIR__."/../includes/footer.php");
?>

</body>
</html>
<?php
$erreur_de_saisie = FALSE;
if (!isset($_POST['nombre-personne-saisi'])){
    /* rien à faire */

} else {

    if (filter_var($_POST['nombre-personne-saisi'], FILTER_VALIDATE_INT)===FALSE){
        $erreur_de_saisie = TRUE;
         echo "Veuillez saisir un nombre entier" . $erreur_de_saisie;
    } else {
        if ($_POST['nombre-personne-saisi'] < $_SESSION['choixNbrePersonneMin']){
            $erreur_de_saisie = TRUE;
        };};
    if ($erreur_de_saisie === TRUE) {
        echo "veuillez corriger ou choisir un autre menu";
    } else {
        echo $_SESSION['statutCommande'] = "Commande validée";
        /*echo "Merci, la commande est " . $_SESSION['statutCommande'];*/
        echo $_SESSION['date-livraison'] = $_POST['date-livraison'];
        echo $_SESSION['heure-livraison'] = $_POST['heure-livraison'];
        echo $_SESSION['nombre-personne-saisi'] = $_POST['nombre-personne-saisi'];
        echo $_SESSION['montant-commande'] = $_POST['nombre-personne-saisi'] * $_SESSION['choixPrixParPersonne'];
        echo $_SESSION['message-complementaire'] = $_POST['message-complementaire'];

    // ici on inscrit une nouvelle commande dans la db
    
    
/*} else {echo "erreur id est absent de session";};*/
    // puis on propose à l'utilisateur d'aller recommander ou de voir ses commandes (vers page commande confirmée)
    ?>
    <script>window.location.replace("http:./confirmationCommande.php");</script>
    <?php
    }
}
?>