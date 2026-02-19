<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Vite & Gourmand</title>

    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/home.css">
    <link rel="stylesheet" href="../CSS/inscription.css">

<!-- empty data URI to prevent the browser from getting the favicon file and showing 404-->
    <link rel="icon" href="data;,">
</head>
<body>

  <?php
require_once (__DIR__."/../includes/header.php");
?>

<main>
    <div class="insc-wrapper">
        <section class="inscription">
                
                    <form action="" method="post">

                        <h1>Inscription</h1>

<br>
<br>
                        
                        <div class="option-connexion">
                            <span>Déjà inscrit?</span>
                            <a href="connexion.php">Connectez-vous</a>
                        </div> 
<br>
<br>
<br>                                     
                        <ion-icon name="mail-outline" id="mail-outline"></ion-icon>
                        <label for="adresse-mail">Votre adresse mail</label>
                        <input type="email" id="insc-adresse-mail" name="adresse-mail" required
                            placeholder="ex monemail@exemple.fr" size="30" maxlength="30">
                            
<br>
<br>
<br>
                        
                        <ion-icon name="lock-open" id="lock-open"></ion-icon>
                        <label for="mot-de-passe">Votre mot de passe</label>
                        <input type="password" id="insc-mot-de-passe" name="mot-de-passe" required
                            placeholder="ex monmotdepasse" size="30" maxlength="30">
 

<br>
<br>
<br>
                        <label for="nom">Votre nom</label>
                        <input type="text" id="insc-nom" name="nom" required
                            placeholder="" size="30" maxlength="30">
<br>
<br>
<br>
                        <label for="prenom">Prénom&nbsp&nbsp&nbsp&nbsp</label>
                        <input type="text" id="insc-prenom" name="prenom" required
                            placeholder="" size="30" maxlength="30">
<br>
<br>
<br>
                        <label for="telephone">Téléphone</label>
                        <input type="text" id="insc-telephone" name="telephone" required
                            placeholder="" size="30" maxlength="30">
<br>
<br>
<br>
                        <label for="adresse-postale">Adresse&nbsp&nbsp&nbsp</label>
                        <input type="text" id="insc-adresse-postale" name="adresse-postale" required
                            placeholder="" size="30" maxlength="30">
<br>
<br>
<br>

                        <div class="submit-button">
                        <input type="submit" value="Validez" maxlength="20">
                        </div>                       
                    </form>

        </section>
    </div>

</main>

<?php
require_once (__DIR__."/../includes/footer.php");
?>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>