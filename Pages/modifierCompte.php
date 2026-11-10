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

                        <h1>Modifier un compte</h1>


<br>
<br> 
<div class="aligne-champ">                                    
                        <label for="adresse-mail">Identifiant</label>
                        <input type="email" id="adresse-mail" name="adresse-mail" required
                            value="test1@test.fr" size="30" maxlength="30"> 
</div>                                                 
<br>
<div class="aligne-champ">       
                        <label for="date-creation">Créé le</label>
                        <input type="text" id="date-creation" name="date-creation" required
                            value="05/10/26" size="30" maxlength="30">
</div>
<br>
<div class="aligne-champ">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" required
                            value="Mercury" size="30" maxlength="30">
</div>
<br>
<div class="aligne-champ">
                        <label for="prenom">Prénom&nbsp&nbsp&nbsp&nbsp</label>
                        <input type="text" id="prenom" name="prenom" required
                            value="Freddy" size="30" maxlength="30">
</div>
<br>
<div class="aligne-champ">
                        <label for="telephone">Téléphone</label>
                        <input type="text" id="telephone" name="telephone" required
                            value="0566757575" size="30" maxlength="30">
</div>
<br>
<div class="aligne-champ">
                        <label for="adresse-postale">Adresse&nbsp&nbsp&nbsp</label>
                        <input type="text" id="adresse-postale" name="adresse-postale" required
                            value="5 rue des Nénuphars" size="30" maxlength="30">
</div>
<br>
<div class="aligne-champ">
                        <label for="ville">Ville&nbsp&nbsp&nbsp</label>
                        <input type="text" id="ville" name="ville" required
                            value="46000 Cahors" size="30" maxlength="30">
</div>
<br>
<div class="aligne-champ">
                        <label for="type-utilisateur">Type d'usager</label>
                        <input type="text" id="type-utilisateur" name="type-utilisateur" required
                            value="client" size="30" maxlength="30">
</div>
<br>
<div class="aligne-champ">
                        <label for="validite">Type d'utilisateur</label>
                        <input type="text" id="validite" name="validite" required
                            value="valide" size="30" maxlength="30">
</div>
<br>
                        <div class="submit-button">
                        <input type="submit" value="Validez" name="Envoi" maxlength="20">
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