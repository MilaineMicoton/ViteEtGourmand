
<?php

// ici on  sélectionne les données de la table menu
$result = $mysqlClient->query("SELECT * FROM menu");

// afficher les menus un à un
while ($menu = $result->fetch(PDO::FETCH_OBJ)) 
    {
    ?>
    <p><?php echo $menu->titre ?></p>
    <p><?php echo $menu->sous_titre ?></p>
    <?php
    }

?> 
  