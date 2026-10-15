async function enregistrerCommande() {

// récupérer le formulaire validé et les données
form2 = document.getElementById("ma-commande"); 
datas2 = new FormData(form2);

// aller chercher le code php qui écrit la commande dans la db
const url2 = "../backend-php/insererCommande.php";
fetch(url2, {method:"post" , body : datas2})

// mettre la "response" dans du texte et une alert
.then (resp => resp.text())
.then (txt => alert(txt));
}