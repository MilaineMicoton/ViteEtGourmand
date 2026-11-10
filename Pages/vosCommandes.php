<?php
session_start();
// d'abord, vérifier si l'utilisateur est bien connecté, sinon redirection vers la page de connexion
if(!isset($_SESSION['email'])){
    ?>
        <script>window.location.replace("http:./connexion.php");</script>
    <?php
    };
echo $_SESSION['email'];
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
</head>
<body>

  <?php
require_once (__DIR__."/../includes/header.php");
?>

<main>
    <h1> Mes commandes Vite et Gourmand</h1>
   

<div class="wrapper-commande">

    <div class="cadre-commande">
    <form  id="ma-commande" action="" method="get">
            <div class="div-titre-menu">
                <label for="titre-menu" class="form-label">Nom du menu</label>
                <input type="text"
                         class="form-control" 
                         id="titre-menu" name="titre-menu" 
                         readonly="readonly" 
                         style="width:200px;"
                         value="Le classique">
            </div>
            <br>
            <div class="div-date-commande">
                <label for="date-commande" class="form-label">Date commande</label>
                <input type="text"
                         class="form-control" 
                         id="date-commande" name="date-commande" 
                         readonly="readonly" 
                         value="10/08/26">
            </div>
            <br>
            <div class="ligne-montant">
                <div class="div-nombre-personne">
                    <label for="nombre-personne" class="form-label">Nombre de couverts</label>
                    <input type="number"  
                        id="nombre-personne"
                        name="nombre-personne" 
                        readonly="readonly"
                        style="width:30px;"
                        value="2" >
                </div>
                <div class="div-montant-commande">
                    <label for="montant-commande" class="form-label">Montant</label>
                    <input type="text" 
                        value="24€"
                        id="montant-commande" 
                        name="montant-commande" 
                        readonly="readonly"
                        style="width:50px;">
                </div>
            </div>
            <br>
            <h3>La livraison</h3>
            <div class="ligne-livraison">
                <div class="div-date-livraison">
                    <label for="date-livraison" class="form-label">Date&nbsp&nbsp</label>
                    <input type="text" 
                        id="date-livraison" 
                        name="date-livraison"
                        readonly="readonly"
                        value="12/08/26">
                </div>
                <div class="div-heure-livraison">
                    <label for="heure-livraison"  class="form-label">Heure</label>
                    <input type="text" 
                        id="heure-livraison" 
                        name="heure-livraison" 
                        style="width:70px;"
                        readonly="readonly"
                        value="12:30">
                </div>
            </div>
            <br>
            <div class="div-statut-commande">
                <label for="statut-commande" class="form-label">Statut de la commande</label>
                <input type="text"
                         class="form-control" 
                         id="statut-commande" name="statut-commande" 
                         readonly="readonly" 
                         style="width:50px;"
                         value="Livrée">
            </div>
            <br>
            <div class="div-message-complementaire">
                <label for="message-complementaire" class="form-label">Précisions complémentaires</label>
                <textarea id="message-complementaire"
                         name="message-complementaire" 
                         rows="3" cols="1" 
                         readonly="readonly"
                ></textarea>
            </div>
            <br>
            <div class ="bouton-avis"
                    style="display:none;">
                   <button type='button'>Ecrire un avis</button>
            </div>            
            <br>            
            <div class="div-avis-client">
                <label for="avis-client" class="form-label">Votre avis</label>
                <textarea id="avis-client"
                         name="avis-client" 
                         rows="4" cols="1" 
                         readonly="readonly"
                         >Repas excellent. le livreur peut-il nous donner le temps de descendre ouvrir svp? Réponse: merci de votre message qui sera pris en compte</textarea>
            </div>
    </form>
    </div>   
    <!------2eme commande ---->
    <div class="cadre-commande">
    <form  id="ma-commande" action="" method="get">
            <div class="div-titre-menu">
                <label for="titre-menu" class="form-label">Nom du menu</label>
                <input type="text"
                         class="form-control" 
                         id="titre-menu" name="titre-menu" 
                         readonly="readonly" 
                         style="width:200px;"
                         value="Le gourmand">
            </div>
            <br>
            <div class="div-date-commande">
                <label for="date-commande" class="form-label">Date commande</label>
                <input type="text"
                         class="form-control" 
                         id="date-commande" name="date-commande" 
                         readonly="readonly" 
                         value="01/09/26">
            </div>
            <br>
            <div class="ligne-montant">
                <div class="div-nombre-personne">
                    <label for="nombre-personne" class="form-label">Nombre de couverts</label>
                    <input type="number"  
                        id="nombre-personne"
                        name="nombre-personne" 
                        readonly="readonly"
                        style="width:30px;"
                        value="2" >
                </div>
                <div class="div-montant-commande">
                    <label for="montant-commande" class="form-label">Montant</label>
                    <input type="text" 
                        value="44€" 
                        id="montant-commande" 
                        name="montant-commande" 
                        readonly="readonly"
                        style="width:50px;"
                        value="44€">
                </div>
            </div>
            <br>
            <h3>La livraison</h3>
            <div class="ligne-livraison">
                <div class="div-date-livraison">
                    <label for="date-livraison" class="form-label">Date&nbsp&nbsp</label>
                    <input type="text" 
                        id="date-livraison" 
                        name="date-livraison"
                        readonly="readonly"
                         value="02/09/26">
                </div>
                <div class="div-heure-livraison">
                    <label for="heure-livraison"  class="form-label">Heure</label>
                    <input type="text" 
                        id="heure-livraison" 
                        name="heure-livraison" 
                        style="width:70px;"
                        readonly="readonly"
                        value="12:30">
                </div>
            </div>
            <br>
            <div class="div-statut-commande">
                <label for="statut-commande" class="form-label">Statut de la commande</label>
                <input type="text"
                         class="form-control" 
                         id="statut-commande" name="statut-commande" 
                         readonly="readonly" 
                         style="width:50px;"
                         value="Livrée">
            </div>
            <br>
            <div class="div-message-complementaire">
                <label for="message-complementaire" class="form-label">Précisions complémentaires</label>
                <textarea id="message-complementaire"
                         name="message-complementaire" 
                         rows="3" cols="1" 
                         readonly="readonly">Sonner longuement svp
                </textarea>
            </div>
            <br>
            <div class ="bouton-avis">
                   <button type='button'>Ecrire un avis</button>
            </div>            
            <br>            
            <div class="div-avis-client">
                <label for="avis-client" class="form-label">Votre avis</label>
                <textarea id="avis-client"
                         name="avis-client" 
                         rows="3" cols="1" 
                         readonly="readonly"
                ></textarea>
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