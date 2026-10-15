<?php
session_start();
// d'abord, vérifier si l'utilisateur est bien connecté, sinon redirection vers la page de connexion
if(!isset($_SESSION['email'])){
    ?>
        <script>window.location.replace("http:./connexion.php");</script>
    <?php
};
/* debugging time!!
/*if(isset($_SESSION['utilisateurID'])){*/
    echo "<br>Voici le contenu session : ";  
    echo "<br>identifiant utilisateur = " . $_SESSION['utilisateurID'];
    echo "<br>  email utilisateur = " . $_SESSION['email'];
 //   echo "<br>  statut commande = " . $_SESSION['statutCommande'];
// echo "<br> menu id = " . $_SESSION['choixMenuId'];
/*} else {echo "erreur id est absent de session";};*/
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
    <link rel="stylesheet" href="../CSS/commandes.css">

<!-- empty data URI to prevent the browser from getting the favicon file and showing 404-->
<link rel="icon" href="data;,">

<!-- lancer script js de validation des saisies 
    <script src="valider_saisie_commande.js" defer></script> -->

    <script src="../javascript/afficherMenuChoisi.js" defer></script>
    <script src="../javascript/enregistrerCommande.js" defer></script>
    <script src="../javascript/validerCommande.js" defer></script>
</head>
<body>

  <?php
require_once (__DIR__."/../includes/header.php");
?>

<main>

<h1>Votre nouvelle commande</h1>

<div class="wrapper-commande">
<!-- ici le javascript va mettre le "cadre-menu" choisi par l'utilisateur -->


<!-- puis on affiche le "cadre-commande" à remplir -->
    <div class="cadre-commande">
    <form  id="ma-commande" action="" method="post">
            <h2 class= "titre-commande"> Complétez votre commande</h2>
            <br>
            <div class="div-mail">
                <label for="email" class="form-label">Email</label>
                <input type="email"
                         class="form-control" 
                         id="email" name="email" 
                         readonly="readonly" 
                         value="<?php echo $_SESSION['email'];?>">
            </div>
            <br>
            <h3>La livraison</h3>
            <br>
            <div class="div-date-livraison">
                <label for="date-livraison" class="form-label">Date&nbsp&nbsp</label>
                <input type="date" 
                        placeholder="date de demain" 
                        id="date-livraison" 
                        name="date-livraison"
                        required>
            </div>
            <div class="div-heure-livraison">
                <label for="heure-livraison"  class="form-label">Heure</label>
                <input type="time" 
                        placeholder="heure de livraison"
                        id="heure-livraison" 
                        name="heure-livraison" 
                        required >
            </div>
            <br>
            <h3>Pour combien de personnes?</h3>
            <div class="div-nombre-personne">
                <label for="nombre-personne-saisi" class="form-label">Nombre de couverts</label>
                <input type="number" 
                        placeholder= "veuillez entrer un nombre"  
                        id="nombre-personne-saisi"
                        name="nombre-personne-saisi" 
                        required >
            </div>
            <br>
            <h3>Montant à régler</h3>
            <div class="div-montant-commande">
                <label for="montant-commande" class="form-label">Total commande&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                <input type="number" 
                        placeholder="en attente de calcul" 
                        id="montant-commande" 
                        name="montant-commande" 
                        readonly="readonly">
            </div>
            <br>
            <div class="div-message-complementaire">
                <label for="message-complementaire" class="form-label">Précisions complémentaires</label>
                <textarea id="message-complementaire"
                         name="message-complementaire" 
                         rows="3" cols="1" 
                         placeholder= "Précisions sur ma livraison..."
                ></textarea>
            </div>
            <br>
            <div id="changer-boutons">
               <div id="div-bouton-valider" class ="bouton-valider">
                   <button type='button'
                         class="bouton-valider"
                         onclick='return valider()'>Valider</button>
               </div>
            </div>
            <br>
            <div class= "retour-utilisateur"></div>
            <div id="params-php">
                
                <input type=text
                        id="statut-commande" 
                        name="statut-commande" 
                        value="eeek">
                
                <input type=text
                        id="choix-MenuId" 
                        name="choix-MenuId" 
                        value="eeek">
                
                <input type=text
                        id="choix-PrixParPersonne" 
                        name="choix-PrixParPersonne" 
                        value="eeek">

                <input type=text
                        id="utilisateurID" 
                        name="utilisateurID" 
                        value="<?php echo $_SESSION['utilisateurID'];?>"
                        >
                        
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
