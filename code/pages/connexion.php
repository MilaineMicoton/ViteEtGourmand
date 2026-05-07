<?php
session_start();
echo '<p style="position: absolute; z-index: -99;">&nbsp</p>';
// on récupère l'id de session s'il existe
$id_session = session_id();
require_once(__DIR__ . '/../includes/databaseconnect.php');
if(isset($_POST['envoi'])){
    $adresseMail  = $_POST['adresse-mail'];
    $motdepasse  = $_POST['mot-de-passe'];

    // ********************ici on  sélectionne les données de la table utilisateur**********
    $statement = $mysqlClient->prepare("SELECT utilisateur_id, email, password FROM utilisateur WHERE email = '$adresseMail' AND password = '$motdepasse'");
    $statement->execute();
    $utilisateurs = $statement->fetchAll(PDO::FETCH_ASSOC);
    // **********************récupère l'id de l'utilisateur qui est unique********************************
    foreach ($utilisateurs as $utilisateur){
        $utilisateurID = $utilisateur['utilisateur_id'];
    }
}  
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
    <link rel="stylesheet" href="../CSS/connexion.css">

<!-- empty data URI to prevent the browser from getting the favicon file and showing 404-->
    <link rel="icon" href="data;,">
</head>
<body>

  <?php
require_once (__DIR__."/../includes/header.php");

?>

<main>
<div class="login-wrapper">
<section class="login">
                
                    <form action="" method="post">

                        <h1>Connexion</h1>

<br>
<?php
//********si la db ne reconnait pas la saisie on retourne l'erreur à l'utilisateur *******/
if (isset($_POST['envoi'])){
    if (empty($utilisateur)){
        echo ' <style>h4{color:red;} </style>';?>
        <h4>Adresse mail ou mot de passe incorrect</h4>
       <?php } else {
       /* *******code debug**********
       if($id_session){
            echo 'ID de session récupéré via sessionid : <br>'
            .$id_session. '<br>';
            echo '<br>';}
        if(isset($_COOKIE['PHPSESSID'])){
            echo 'ID de session récupéré via cookie : <br>'
            .$_COOKIE['PHPSESSID']. '<br>';
        echo '<br>';}*/
        $_SESSION['utilisateurID'] = $utilisateurID;
        $_SESSION['email'] = $adresseMail;
        echo ' <style>h4{color:black;} </style>';?>
        <h4>Bonjour!<br>Vous pouvez commander nos
        <a href="../pages/menus.php">menus</a></h4>
        
        <?php
    }};
?>

<br>
                 
                        <ion-icon name="mail-outline" id="mail-outline"></ion-icon>
                        <label for="adresse-mail">Votre adresse mail</label>
                        <input type="email" id="adresse-mail" name="adresse-mail" required
                            placeholder="ex monemail@exemple.fr" size="20" maxlength="30">
                            
<br>
<br>
<br>
                        
                        <ion-icon name="lock-open" id="lock-open"></ion-icon>
                        <label for="mot-de-passe">Votre mot de passe</label>
                        <input type="password" id="mot-de-passe" name="mot-de-passe" required
                            placeholder="ex monmotdepasse" size="20" maxlength="20">
             
<br>
<br>
<br>         
                     
                        <input type="checkbox" id="mdp-oubli">
                        <label for="mdp-oubli">Mot de passe oublié? Cochez la case</label>
                        
                        
<br>
<br>
<br> 
                        <div class="submit-button">
                        <input type="submit" value="Connexion" name="envoi">
                        </div>

<br>
<br>
<br>  
                         <div class="option-inscription">
                        <span>Pas de compte?</span>
                            <a href="inscription.php">Inscrivez-vous</a>
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