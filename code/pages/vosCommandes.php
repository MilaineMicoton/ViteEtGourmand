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
    <link rel="stylesheet" href="../CSS/vosCommandes.css">

<!-- empty data URI to prevent the browser from getting the favicon file and showing 404-->
    <link rel="icon" href="data;,">
</head>
<body>

  <?php
require_once (__DIR__."/../includes/header.php");
?>

<main>
    <h1> VOS COMMANDES</h1>
</main>

<?php
require_once (__DIR__."/../includes/footer.php");
?>

</body>
</html>