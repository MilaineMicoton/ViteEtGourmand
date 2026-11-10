<?php
session_start();
require_once(__DIR__ . '/../config/mysql.php');
require_once(__DIR__ . '/../includes/databaseconnect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Vite & Gourmand</title>

    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/home.css">
    <link rel="stylesheet" href="../CSS/inscription.css">
    <link rel="stylesheet" href="../CSS/modifierCompte.css">
    <link rel="stylesheet" href="../CSS/ajouterMenu.css">

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
    <div class="insc-wrapper">
        <section class="inscription">
                
                    <form action="" method="post">
<div class="aligne-champ">
<div class="telecharger-image">
<img src="..\images\hearts-9463310_640.jpg">
</div>
<div class="div-h1">
                        <h1>Ajouter un menu</h1>
</div>
</div>
<br>
<div class="aligne-champ">                                 
                        <label for="titre">Titre</label>
                        <input type="titre" id="adresse-mail" name="titre" required
                            value="Le Pantagruel" size="30" maxlength="30"> 
 </div>                                               
<br>
<div class="aligne-champ">     
                        <label for="sous-titre">Sous-titre</label>
                        <input type="text" id="sous-titre" name="sous-titre" required
                            value="Pour les bons vivants" size="30" maxlength="30">
</div>
<br>
<div class="aligne-champ">
                        <label for="ligne1">Ligne 1</label>
                        <input type="text" id="ligne1" name="ligne1" required
                            value="Paté de faisan en croute" size="30" maxlength="30">
</div>
<br>
<div class="aligne-champ">
                        <label for="ligne2">Ligne 2</label>
                        <input type="ligne2" id="prenom" name="ligne2" required
                            value="Trou normand" size="30" maxlength="30">
</div>
<br>
<div class="aligne-champ">
                        <label for="ligne3">Ligne 3</label>
                        <input type="text" id="ligne3" name="ligne3" required
                            value="Civet de chevreuil aux cèpes " size="30" maxlength="30">
</div>
<br>
<div class="aligne-champ">
                        <label for="ligne4">Ligne 4</label>
                        <input type="text" id="ligne4" name="ligne4" required
                            value="Sélection de fromages" size="30" maxlength="30">
</div>
<br>
<div class="aligne-champ">
                        <label for="ligne5">Ligne 5</label>
                        <input type="text" id="ligne5" name="ligne5" required
                            value="Pastis aux pommes du pays" size="30" maxlength="30">
</div>
<br>
<div class="ligne-prix-min">
                        <label for="prix">Prix</label>
                        <input type="text" id="prix" name="prix" required
                            value="55€" size="10" maxlength="10">


                        <label for="minimum">Nombre minimum</label>
                        <input type="text" id="minimum" name="minimum" required
                            value="4" size="4" maxlength="4">

</div>
<br>
                        <div class="submit-button">
                        <input type="submit" value="Enregistrez" name="Envoi" maxlength="20">
                        </div>                       
                    </form>

        </section>
    </div>

</main>

<?php
require_once (__DIR__."/../includes/footer.php");
?>

</body>
</html>