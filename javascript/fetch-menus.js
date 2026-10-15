async function fetchMenus(){
// fetch content from server & put into div

// invoquer mon script php pour récupérer les menus
const url = "../backend-php/fetch-menus.php";
const fetcher = await fetch(url);

// récupérer le json du script sous forme d'objet JS
const json = await fetcher.json();

// récupérer le nombre de menus disponibles
const nbreMenus = Object.keys(json).length;
console.log(nbreMenus);


// boucle pour afficher tous les menus

let i=0;
while (i < nbreMenus){
let afficher = (json[i]); 
    i++;
    console.log(afficher);
 // créer une nouvelle balise html avec les détails de chaque menu
const cadreMenu =
    `<form method="get" action="passerCommande.php"> 
    <div class="cadre-menu">
        <input type="hidden" name="choixMenuId" value='${afficher.menu_id}'>
        <input type="hidden" name="choixUrlPhoto" value='${afficher.url_photo}'>
        <img src=${afficher.url_photo}>
        <article>
            <h2>${afficher.titre}</h2>
            <input type="hidden" name="choixTitre" value='${afficher.titre}'>
            <br>
            <p>${afficher.sous_titre}</p>
            <input type="hidden" name="choixSousTitre" value='${afficher.sous_titre}'>
            <p><br>
            ${afficher.menu_ligne1}<br>
            <input type="hidden" name="choixLigne1" value='${afficher.menu_ligne1}'>
            ${afficher.menu_ligne2}<br>
            <input type="hidden" name="choixLigne2" value='${afficher.menu_ligne2}'>
            ${afficher.menu_ligne3}<br>
            <input type="hidden" name="choixLigne3" value='${afficher.menu_ligne3}'>
            ${afficher.menu_ligne4}<br>
            <input type="hidden" name="choixLigne4" value='${afficher.menu_ligne4}'>
            ${afficher.menu_ligne5}<br></p>
            <input type="hidden" name="choixLigne5" value='${afficher.menu_ligne5}'>
            <br>
        </article>
            <div class = "ligne-prix-bouton">
                <p class="prix">par personne: ${afficher.prix_par_personne}€<br>
                <input type="hidden" name="choixPrixParPersonne" value = '${afficher.prix_par_personne}'>
                minimum ${afficher.nbre_personne_min} pers.</p>
                <input type="hidden" name="choixNbrePersonneMin" value = '${afficher.nbre_personne_min}'>
                <input type="hidden" name="statutCommande" value = 'Nouvelle Commande'>
                <div class="bouton-commander">
                 <button type="submit">Commander</button>
                </div>
            </div>
     </div>
     </form> `;

document.querySelector('.wrapper-les-menus').insertAdjacentHTML("beforeend", cadreMenu)
// et hop! on recommence jusquàa la fin des menus!!
}
};
// ici on invoque la fonction déclarée ci-dessus
console.log('je suis dans le js fetch-menus');
fetchMenus();