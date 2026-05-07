<?php
session_start();
echo '<p style="position: absolute; z-index: -99;">&nbsp</p>';?>
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
require_once(__DIR__ . '/../includes/databaseconnect.php');
// ********************ici on  sélectionne les données de la table menu**********
$statement = $mysqlClient->prepare ("SELECT * FROM menu LIMIT 10");
$statement->execute();
$allMenus = $statement->fetchAll(PDO::FETCH_ASSOC);?>
<?php
// ****************************afficher les menus un à un**************************
foreach ($allMenus as $oneMenu) {?>
    <div class="cadre-menu">
        <?php echo $choixImage='<img src="'.$oneMenu['url_photo'].'" alt="Menu classique">';?>
        <article>
            <h2><?php echo $choixTitre = $oneMenu['titre'];?></h2>
            <br>
            <p><?php echo $choixSousTitre = $oneMenu['sous_titre'];?><br>
            <br>
            <?php echo $choixLigne1 = $oneMenu['menu_ligne1'];?><br>
            <?php echo $choixLigne2 = $oneMenu['menu_ligne2'];?><br>
            <?php echo $choixLigne3 = $oneMenu['menu_ligne3'];?><br>
            <?php echo $choixLigne4 = $oneMenu['menu_ligne4'];?><br>
            <?php echo $choixLigne5 = $oneMenu['menu_ligne5'];?></p>
            <br>
        <!-- on insère ici les autres éléments du menu à faire passer -->
        <?php
        $choixImage = $oneMenu['url_photo'];
        $choixPrixParPersonne = $oneMenu['prix_par_personne'];
        $choixNbrePersonneMin = $oneMenu['nbre_personne-min'];
        $choixMenuId = $oneMenu['menu_id'];
        ?>
        <form method="post" action="passerCommande.php">
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
            <input type="hidden" name="statutCommande" value='Nouvelle Commande'>
            <?php 
            $_SESSION['statutCommande'] = "Nouvelle Commande";
            $_SESSION['choixMenuId'] = $choixMenuId;
            ?>
        </article>
            <div class = "ligne-prix-bouton">
                <p class="prix">par personne: <?php echo $oneMenu['prix_par_personne'] ?>€<br>
                minimum <?php echo $oneMenu['nbre_personne-min'] ?> pers.</p>
                <div class="bouton-commander">
                        <button type="submit">Commander</button>
                </div>
            </div>
        </form>
    </div>
    <?php
    }
?> 
</div>
</main>
<?php
require_once (__DIR__."/../includes/footer.php");
?>
</body>
</html>