<?php
session_start();
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

<!-- va chercher les menus de la db via le javascript (AJAX) et php,  à la fin du chargement de la page-->
    <script src="../javascript/fetch-menus.js" defer></script>

<!-- empty data URI to prevent the browser from getting the favicon file and showing 404-->
 <!--   <link rel="icon" href="data;,"> -->
</head>
<body>
  <?php
// *************************** le header **************************
require_once (__DIR__."/../includes/header.php");
?>
<main>
<h1>Nos menus</h1>
<div class="wrapper-les-menus">
    
</div>

</main>

<?php
require_once (__DIR__."/../includes/footer.php");
?>

</body>
</html>