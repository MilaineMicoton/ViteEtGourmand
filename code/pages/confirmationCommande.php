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
    echo "Voici le contenu session : ";    
    echo "<br>identifiant utilisateur = " . $_SESSION['utilisateurID'];
    echo "<br>email utilisateur = " . $_SESSION['email'];
    echo "<br>statut commande = " . $_SESSION['statutCommande'];
    echo "<br>menu id = " . $_SESSION['choixMenuId'];
fin du debugging*/
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

<h1>Commande confirmée</h1>

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
            <h2> Merci de votre commande</h2>
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
                <input type="date" placeholder="date de demain" id="date-livraison" name="date-livraison" readonly="readonly"
                    value = <?php if (isset($_SESSION['date-livraison'])){echo $_SESSION['date-livraison'];}?>>
            </div>
            <div class="div-heure-livraison">
                <label for="heure-livraison"  class="form-label">Heure</label>
                <input type="time" placeholder="heure de livraison" id="heure-livraison" name="heure-livraison" readonly="readonly" 
                value = <?php if (isset($_SESSION['heure-livraison'])){echo $_SESSION['heure-livraison'];}?>>
            </div>
            <br>
            <h3>Pour combien de personnes?</h3>
            <div class="div-nombre-personne">
                <label for="div-nombre-personne" class="form-label">Nombre de couverts</label>
                <input type="number" placeholder= "veuillez entrer un nombre"  id="nombre-personne-saisi" name="nombre-personne-saisi" readonly="readonly" 
                value = <?php if (isset($_SESSION['nombre-personne-saisi'])){echo $_SESSION['nombre-personne-saisi'];}?>>
            </div>
            <br>
            <h3>Montant à régler</h3>
            <div class="div-montant-commande">
                <label for="montant-commande" class="montant-commande">Total commande&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                <input type="number" placeholder="en attente de calcul" id="montant-commande" name="montant-commande" readonly="readonly"     
                value = <?php if (isset($_SESSION['nombre-personne-saisi'])){echo $_SESSION['nombre-personne-saisi'] * $_SESSION['choixPrixParPersonne'];}?>>
            </div>
            <br>
            <div class="div-message-complementaire">
                <label for="message-complementaire" class="form-label">Précisions complémentaires</label>
                <textarea id="message-complementaire" name="message-complementaire" rows="3" cols="1" placeholder= "Précisions sur ma livraison..." readonly="readonly"
                ><?php if (isset($_SESSION['message-complementaire'])){echo $_SESSION['message-complementaire'];};?></textarea>
            </div>
            <br>
            <div class="double-bouton">
                <div class="bouton-menus-2">
                    <a href="../pages/menus.php">Nouvelle commande</a>         
                </div>
                <div class="bouton-voir-commandes">
                    <a href="../pages/vosCommandes.php">Voir mes commandes</a>         
                </div>
            </div>
            <br>
            <div class = "retour-utilisateur">
                <h4>Votre commande sera bientôt livrée!</h4>
            </div>
    </form>
    </div>

</div>

</main>

<?php
/* on écrit la commande dans la db */
$utilisateurID = $_SESSION['utilisateurID'];
$choixMenuId = $_SESSION['choixMenuId'];
$dateLivraison = $_SESSION['date-livraison'];
$heureLivraison = $_SESSION['heure-livraison'];
$prixMenu = $_SESSION['choixPrixParPersonne'];
$nombrePersonne = $_SESSION['nombre-personne-saisi'];
$precisionComplementaire = $_SESSION['message-complementaire'];
$statut = $_SESSION['statutCommande'];

$sqlInsert = "INSERT INTO commande (`utilisateur_id`, `menu_id`, `date_livraison`, 
             `heure_livraison`, `prix_menu`, `nombre_personne`, `precision_complement`, `statut`) 
             VALUES ('$utilisateurID', '$choixMenuId', '$dateLivraison', '$heureLivraison', 
             '$prixMenu','$nombrePersonne', '$precisionComplementaire', '$statut')";

$mysqlClient->exec($sqlInsert);
 echo "<style>h4{color:red;} </style>";
    
?>
<?php
require_once (__DIR__."/../includes/footer.php");
?>
</body>
</html>
