Voici comment démarrer le conteneur viteetgourmand sur votre PC.
D'abord vous avez besoin du CLI Docker sur votre PC, il doit être lancé.

Ensuite il faut récupérer le projet sur git hub, la bonne version est
uniquement sur la branche "official".

puis vous l'ouvrez en vscode avec un nouveau terminal, et là vous faites:

docker compose up -d

le projet se deploiera sur localhost:8080 pour le site,
et localhost:8081 pour phpMyadmin.

Allez d'abord sur phpmyadmin, et entrez-y avec user = root et password = root.
cliquez sur la base de données viteetgourmand, cliquez sur "importer",
puis allez chercher le fichier  /code/sql/creation-base.sql

Cliquez sur enregistrer, cela créera les tables de la base de données.
Vous pouvez ensuite découvrir l'accueil du site sur localhost:8080.

Vous pourrez visionner les menus disponibles (bouton / header / footer) sans connexion.
Cependant si vous essayez de passer commande, vous atterrirez sur la page connexion.
De là vous pouvez: soit vous connecter si vous avez un compte, soit aller vous inscrire.

Pour s'inscrire, on part de la page connexion, puis on clique sur "inscrivez-vous".
Une fois l'inscription acceptée, il faut aller se connecter.

Quand la connexion est acceptée, vous avez un lien pour revenir vers les menus.
C'est uniquement à partir des menus que l'on peut commander.

Choisir un menu et cliquer sur le bouton Commander. Cela vous mènera vers la page
Nouvelle Commande, où il vous suffira de remplir la date et heure de livraison,
le nombre de personnes et éventuellement des instructions supplémentaires.

Cliquez sur Valider, et après validation, la page de confirmation de la nouvelle
commande apparaîtra. De là, vous pourrez recommander, ou (quand cette page sera disponible
 en phase 2) visionner vos commandes.


 Bon appétit!