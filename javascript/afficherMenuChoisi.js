// récupérer les données (paramètres) de l'url de la page
let params = new URL(document.location.toString()).searchParams;
let choixMenuId = params.get('choixMenuId')
let choixUrlPhoto = params.get('choixUrlPhoto');
let choixTitre = params.get('choixTitre');
let choixSousTitre = params.get('choixSousTitre');
let choixLigne1 = params.get("choixLigne1");
let choixLigne2 = params.get("choixLigne2");
let choixLigne3 = params.get("choixLigne3");
let choixLigne4 = params.get("choixLigne4");
let choixLigne5 = params.get("choixLigne5");
let choixPrixParPersonne = params.get("choixPrixParPersonne");
let choixNbrePersonneMin = params.get("choixNbrePersonneMin");
let statutCommande = 'Nouvelle commande';


// reconstruire le "cadre-menu" reproduisant le menu choisi par l'utilisateur dans la page des menus
const cadreMenu =   `    
<div class="cadre-menu">
        
        <img src=${choixUrlPhoto}>
        <article>
            <h2>${choixTitre}</h2>
            <br>
            <p>${choixSousTitre}<br>
            <br>
            ${choixLigne1}<br>
            ${choixLigne2}<br>
            ${choixLigne3}<br>
            ${choixLigne4}<br>
            ${choixLigne5}</p>
            <br>
        </article>
            <div class = "ligne-prix-bouton">
                <p class="prix">par personne: ${choixPrixParPersonne} € &nbsp;
                minim. ${choixNbrePersonneMin} pers.</p>
            </div>
     </div>
      `;

// afficher le cadre-menu choisi
document.querySelector('.wrapper-commande').insertAdjacentHTML("afterbegin", cadreMenu);

// inserer le statut de la commande sur la page
document.getElementById('statut-commande').innerHTML=statutCommande;




