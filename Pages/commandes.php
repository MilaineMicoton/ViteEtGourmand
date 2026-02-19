<?php
//
//
// * On ne traite pas les super globales provenant de l'utilisateur directement,
// * ces données doivent être testées et vérifiées.
//

// $postData = $_POST;
 
//if  (!isset($postData['choixImage']))
 //    {
  //      print_r(array_values($_POST));
    //    echo "ça boggue";
   //      return;}
///
// print_r(array_values($_POST));
//echo $_POST['choixMenuId'];
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
</head>
<body>

  <?php
require_once (__DIR__."/../includes/header.php");
?>

<main>

<?php
// print_r(array_values($_POST));
?>

<h1>Votre nouvelle commande</h1>

<div class="wrapper-commande">
    <div class="cadre-menu">
        <!-- ici on reproduit le cadre du menu sans le bouton commander -->
        <?php echo $choixImage='<img src="'.$_POST['choixImage'].'" alt="Menu classique">'?>
        <article>
            <h2><?php echo $_POST['choixTitre'] ?></h2><br>
            <p><?php echo $_POST['choixSousTitre'] ?><br><br>
            <?php echo $_POST['choixLigne1'] ?><br>
            <?php echo $_POST['choixLigne2'] ?><br>
            <?php echo $_POST['choixLigne3'] ?><br>
            <?php echo $_POST['choixLigne4'] ?><br>
            <?php echo $_POST['choixLigne5'] ?></p>
            <br>

        </article>
            
         <p class="prix">par personne: <?php echo $_POST['choixPrixParPersonne'] ?>€</p>
         <p class="min">Nombre minimum de personnes: <?php echo $_POST['choixNbrePersonneMin'] ?></p>

    </div>
    <div class="cadre-commande">
    <form action="submit_commande.php" method="POST">
            <h2> Complétez votre commande</h2>
            <br>
            <div class="div-mail">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <br>
            <h3>La livraison</h3>
            <br>
            <div class="div-date-livraison">
                <label for="date-livraison" class="form-label">Date&nbsp&nbsp</label>
                <input type="date" placeholder="date de demain" id="date-livraison" name="date-livraison">
            </div>
            <div class="div-heure-livraison">
                <label for="heure-livraison"  class="form-label">Heure</label>
                <input type="heure" placeholder="heure de livraison" id="heure-livraison" name="heure-livraison">
            </div>
            <br>
            <h3>Pour combien de personnes?</h3>
            <div class="div-nombre-personne">
                <label for="div-nombre-personne" class="form-label">Nombre de couverts</label>
                <input type="nombre" placeholder= "0"  id="nombre-personne" name="nombre-personne">
            </div>
            <br>
            <h3>Montant à régler</h3>
                <div class="div-montant-commande">
                <label for="montant-commande" class="montant-commande">Total commande&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                <input type="nombre" placeholder="0" id="montant-commande" name="montantCommande">
            </div>
            <br>
            <div class="div-message-complementaire">
                <label for="message-complementaire" class="form-label">Précisions complémentaires</label>
                <textarea class="form-control" placeholder="Précisions complémentaires sur la livraison" id="message-complementaire" name="message-complementaire"></textarea>
            </div>
            <br>
            <div class="bouton-valider">
            <button type="submit" class="bouton-valider">Valider</button>
            </div>
            <br>
            <br>
            <div class="div-statut">
                <label for="div-statut" class="form-label">Statut commande&nbsp&nbsp&nbsp&nbsp</label>
                <input type="text" placeholder="statut" id="statut" name="statut">
            </div>
    </form>
    </div>

</div>

</main>

<?php
require_once (__DIR__."/../includes/footer.php");
?>

</body>
</html>