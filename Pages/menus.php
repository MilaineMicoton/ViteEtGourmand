<!-- inclusion des variables et fonctions --> 
<?php
session_start();
require_once(__DIR__ . '/../config/mysql.php');
require_once(__DIR__ . '/../includes/databaseconnect.php');
require_once(__DIR__ . '/../includes/variables.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Vite & Gourmand</title>
    
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/home.css">
    <link rel="stylesheet" href="../CSS/menus.css">

<!-- empty data URI to prevent the browser from getting the favicon file and showing 404-->
    <link rel="icon" href="data;,">
</head>
<body>

  <?php
// *************************** le header **************************
require_once (__DIR__."/../includes/header.php");
?>

<main>
<h1>Nos menus</h1>
<div class="wrapper-les-menus">
    <?php

// ********************ici on  sélectionne les données de la table menu**********
$statement = $mysqlClient->prepare ("SELECT * FROM menu LIMIT 10");
$statement->execute();
$allMenus = $statement->fetchAll(PDO::FETCH_ASSOC);
// ****************************afficher les menus un à un**************************
   ?>

   <?php 
foreach ($allMenus as $oneMenu)  
    {?>

    <div class="cadre-menu">
        <?php echo $choixImage='<img src="'.$oneMenu['url_photo'].'" alt="Menu classique">'?>
        <article>
            <h2><?php echo $choixTitre = $oneMenu['titre'] ?></h2>
            <br>
            <p><?php echo $choixSousTitre = $oneMenu['sous_titre'] ?><br>
            <br>
            <?php echo $choixLigne1 = $oneMenu['menu_ligne1'] ?><br>
            <?php echo $choixLigne2 = $oneMenu['menu_ligne2'] ?><br>
            <?php echo $choixLigne3 = $oneMenu['menu_ligne3'] ?><br>
            <?php echo $choixLigne4 = $oneMenu['menu_ligne4'] ?><br>
            <?php echo $choixLigne5 = $oneMenu['menu_ligne5'] ?></p>
            <br>

        <!-- on insère ici les autres éléments du menu à faire passer -->

        <?php
        $choixImage = $oneMenu['url_photo'];
        $choixPrixParPersonne = $oneMenu['prix_par_personne'];
        $choixNbrePersonneMin = $oneMenu['nbre_personne-min'];
        $choixMenuId = $oneMenu['menu_id'];
        ?>

        <form method="post" action="commandes.php">
            <input type="hidden" name="choixImage" value='<?php echo "$choixImage"?>'/>
            <input type="hidden" name="choixTitre" value='<?php echo "$choixTitre"?>'/>
            <input type="hidden" name="choixSousTitre" value='<?php echo "$choixSousTitre"?>'/>
            <input type="hidden" name="choixLigne1" value='<?php echo "$choixLigne1"?>'/>
            <input type="hidden" name="choixLigne2" value='<?php echo "$choixLigne2"?>'/>
            <input type="hidden" name="choixLigne3" value='<?php echo "$choixLigne3"?>'/>
            <input type="hidden" name="choixLigne4" value='<?php echo "$choixLigne4"?>'/>
            <input type="hidden" name="choixLigne5" value='<?php echo "$choixLigne5"?>'/>
            <input type="hidden" name="choixPrixParPersonne" value='<?php echo "$choixPrixParPersonne"?>'/>
            <input type="hidden" name="choixNbrePersonneMin" value='<?php echo "$choixNbrePersonneMin"?>'/>
            <input type="hidden" name="choixMenuId" value='<?php echo "$choixMenuId"?>'/>



        </article>
            <div class = "ligne-prix-bouton">
                <p class="prix">par personne: <?php echo $oneMenu['prix_par_personne'] ?>€<br>
                minimum <?php echo $oneMenu['nbre_personne-min'] ?> pers.</p>
                <div class="bouton-commander">
                       <!-- <a href="commandes.php">Commander</a> -->
                        <button type="submit">Commander</button>
                </div>
            </div>
        </form>
    </div>
 
    <?php
    }
?> 
</div>
<div class="wrapper-les-menus">

    <div class="cadre-menu">
        <img src="../images/circles-9451627_640.jpg" alt="Menu classique">
        <article>
            <h2>Menu "Le classique"</h2>
            <p>un repas traditionnel<br>
            soupe<br>viande<br>légumes<br>fromage<br>dessert</p>
            
        </article>
        <h3>prix du menu</h3>
            <button class="bouton-commander" type="button">Commander</button>
    </div>

    <div class="cadre-menu">
        <img src="../images/hearts-9463310_640.jpg" alt="Menu 2">
        <article>
            <h2>Le gourmand</h2>
            <p>pour les bons appétits</p>
            <p>prix du menu</p>
            <button class="bouton-commander" type="button">Commander</button>
        </article>
    </div>

    <div class="cadre-menu">
        <img src="../images/hearts-9463312_640.jpg" alt="Menu 3">
        <article>
            <h2>La ligne en vue</h2>
            <p>Pour garder la ligne</p>
            <p>prix du menu</p>
            <button class="bouton-commander" type="button">Commander</button>
        </article>
    </div>

    <div class="cadre-menu">
        <img src="../images/hex-9452616_640.jpg" alt="Menu 4">
        <article>
            <h2>Menu 1</h2>
            <p>descriptif du menu</p>
            <p>prix du menu</p>
            <button class="bouton-commander" type="button">Commander</button>
        </article>
    </div>

    <div class="cadre-menu">
        <img src="../images/pattern-9468319_640.jpg" alt="Menu 5">
        <article>
            <h2>Menu 5</h2>
            <p>descriptif du menu</p>
            <p>prix du menu</p>
            <button class="bouton-commander" type="button">Commander</button>
        </article>
    </div>
</div>
</main>

<?php
require_once (__DIR__."/../includes/footer.php");
?>

</body>
</html>