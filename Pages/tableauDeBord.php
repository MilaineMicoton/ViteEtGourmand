<?php
session_start();
?>
<!-------------------------------le code html commence ici -------------------------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Vite & Gourmand</title>

    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/home.css">
    <link rel="stylesheet" href="../CSS/tableauDeBord.css">

<!-- empty data URI to prevent the browser from getting the favicon file and showing 404-->
    <link rel="icon" href="data;,">
</head>
<body>

  <?php
if ($_SESSION['typeUtilisateur'] == "employe" || $_SESSION['typeUtilisateur'] == "admin") { 
require_once (__DIR__."/../includes/headerTB.php");}
else {
require_once (__DIR__."/../includes/header.php");}
?>

<main>
<div class="TB-wrapper">
<section class="tableau-bord">
<h1>Tableau de bord</h1>
<br>
<p>Bonjour! que voulez-vous faire?</p>
<br>
<div class="ligne-ajouter">
    
    <p>Vous pouvez ajouter un menu</p>
    <div class="ajouter-un-menu">
    <a href="../pages/ajouterMenu.php">Ajoutez</a> 
    </div>

</div>
<br>
<br>
<p><strong>ou gérer les commandes ou les comptes</strong></p>
<br>
<div class="afficher-trier-wrapper">
    <a href="../pages/modifierCompte.php">modifCpte</a>
    <a href="../pages/gererCommande.php">gererComm</a>

    <div class="afficher-trier-en-ligne">
        <div class="grid-item grid-text">      
        <p>Afficher :</p>
        </div>
        <div class="grid-item">
        <input type="radio" id="commande" name="afficher" value="commande" checked>
        <label for="commande">Commandes</label><br>
        </div>
        <div class="grid-item">
        <input type="radio" id="compte" name="afficher" value="compte">
        <label for="compte">Comptes</label><br>
        </div>
        <div class="grid-item grid-text">
        <p>Trier par :</p>
        </div>
        <div class="grid-item">
        <input type="radio" id="identifiant" name="trier" value="identifiant">
        <label for="identifiant">Identifiant</label><br>
        </div>
        <div class="grid-item">
        <input type="radio" id="date-creation" name="trier" value="date-creation" checked>
        <label for="date-creation">Date création</label><br>
        </div>
    </div>

    </form>

</div>
<br>
<div class="liste-selection">

    <form>
        
        <div class="ligne-selection">

            <input type="email" id="adresse-mail1" name="adresse-mail" required
            value="test@test.fr" size="20" maxlength="30">           
                        
            <input type="text" id="liste-date1" name="liste-date" required
            value="27/08/2026" size="20" maxlength="20">
                           
            <input type="radio" id="bouton-liste1" name="bouton-liste">
            <label for="bouton-liste1">Accès</label>
                        
        </div>
                        
        <div class="ligne-selection">

            <input type="email" id="adresse-mail2" name="adresse-mail" required
            value="test2@test.fr" size="20" maxlength="30">           
                        
            <input type="text" id="liste-date2" name="liste-date" required
            value="16/08/2026" size="20" maxlength="20">
                           
            <input type="radio" id="bouton-liste2" name="bouton-liste">
            <label for="bouton-liste2">Accès</label>
                        
        </div>

        <div class="ligne-selection">

            <input type="email" id="adresse-mail3" name="adresse-mail" required
            value="test3@test.fr" size="20" maxlength="30">           
                        
            <input type="text" id="liste-date3" name="liste-date" required
            value="01/08/2026" size="20" maxlength="20">
                           
            <input type="radio" id="bouton-liste" name="bouton-liste">
            <label for="bouton-liste">Accès</label>
                        
        </div>

        <br>
        <br>

        <div class="div-bouton-envoyer">
                   <button type='button'
                         class="bouton-envoyer"
                         style="color:white;"
                         >Accédez</button>
        </div>
    </form>

</div>
</section>
</div>   
</main>

<?php
require_once (__DIR__."/../includes/footer.php");
?>

</body>
</html>