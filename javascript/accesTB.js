
const typeUtilisateur = document.getElementById("type-utilisateur");


if (typeUtilisateur === "employe"){
    
    const accesTB = document.getElementById("accesTB");
    accesTB.setAttribute ("href", "../pages/tableauDeBord.php");
    console.log("cest changé!")
} else {
    console.log("cest bien connexion qu'on veut");
}