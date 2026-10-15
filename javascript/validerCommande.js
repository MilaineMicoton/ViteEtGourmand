async function valider() {

// obtenir les divers élément pour les manip en JS
let form = document.getElementById("ma-commande"); 
let retourUtilisateur = document.querySelector('.retour-utilisateur');
let changerBoutons = document.getElementById("changer-boutons");
let divBoutonValider = document.getElementById("div-bouton-valider");
let nouveauTitreCommande = document.querySelector('.titre-commande');


//obtenir les données pour les transmettre au php
let datas = new FormData(form);
let retour = "";

    // ----------validation des données ici--------

// date de livraison

// heure de livraison


// nombre de couverts saisi par rapport au minimum pour ce menu
let nbrePersonneSaisi = datas.get("nombre-personne-saisi");
if (choixNbrePersonneMin > nbrePersonneSaisi) {
    let retour=`<p>il faut un minimum de couverts pour ce menu</p>`;
    console.log(retour);
    retourUtilisateur.innerHTML = retour;
    return false;      
    }

// mettre le menu id, le statut commande et le prix dans le formulaire pour php
const baliseStatutCommande = document.getElementById("statut-commande");
baliseStatutCommande.setAttribute("value", "Nouvelle commande");
const baliseChoixMenuId = document.getElementById("choix-MenuId");
baliseChoixMenuId.setAttribute("value", choixMenuId);
const baliseChoixPrixParPersonne = document.getElementById("choix-PrixParPersonne"); 
baliseChoixPrixParPersonne.setAttribute("value", choixPrixParPersonne)

// calcule et affiche le montant de la commande

const montantCommande = choixPrixParPersonne * nbrePersonneSaisi;
const baliseMontantCommande = document.getElementById("montant-commande");
baliseMontantCommande.setAttribute("value", montantCommande);

confMessage = `Montant de votre commande = ${montantCommande}`;
confirmation = confirm (confMessage);
if (!confirmation) return false;

// commande validée ok 
await enregistrerCommande();

const nouveauxBoutons = `
        <div class="double-bouton">
                <div class="bouton-menus-2">
                    <a href="../pages/menus.php">Nouvelle commande</a>         
                </div>
                <div class="bouton-voir-commandes">
                    <a href="../pages/vosCommandes.php">Voir mes commandes</a>         
                </div>
        </div>
        `;
        
retour=`<p>Commande validée!</p>`;
nouveauTitreCommande.innerHTML = 'Merci de votre commande';

console.log(retour);
retourUtilisateur.innerHTML = retour;
divBoutonValider.remove();
console.log(nouveauxBoutons);
changerBoutons.innerHTML = nouveauxBoutons;


}


