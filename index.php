<!-- inclusion des variables et fonctions -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Vite & Gourmand</title>
    
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/home.css">


<!-- empty data URI to prevent the browser from getting the favicon file and showing 404-->
    <link rel="icon" href="data;,">
</head>
<body>
  <?php
require_once (__DIR__."/includes/header.php");
require_once (__DIR__."/includes/home.php");
require_once (__DIR__."/includes/footer.php");
?>

</body>
<!-- comment 
 

session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/includes/databaseconnect.php');
require_once(__DIR__ . '/includes/variables.php');
require_once(__DIR__ . '/includes/functions.php');
?>


-->
</html>