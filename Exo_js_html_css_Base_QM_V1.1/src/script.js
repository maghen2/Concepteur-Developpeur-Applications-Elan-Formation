/*
Exercices JS - Base – Elan Formation
Vous devez avoir fait l’exercice guidé TODO pour avoir la compréhension nécessaire de ces exercices. Si ce n’est pas le cas référez-vous à votre formateur du jour

Exercice 1 : Créer une page web affichant un carré 200 x 200 pixels de la couleur et un contenu texte de votre choix.
En cliquant sur la forme, une boîte de dialogue (alerte) affiche les informations suivantes

Couleur du texte et couleur de fond
Hauteur et largeur du carré
Nom de la classe du carré (class : "carre" par exemple)
Police et taille du texte
*/

// on recupere l'element et on lui ajoute un evenement
let divCard = document.querySelector("div#card"); // <div id="card">
let divCardSpan = divCard.querySelector("span"); //<div id="card"> <span>

divCard.addEventListener("click", ()=>{
    let alert = " Couleur du texte: "+window.getComputedStyle(divCardSpan).getPropertyValue('color');
    alert += "\n couleur de fond: "+window.getComputedStyle(divCard).getPropertyValue('background-color');
    alert += "\n Hauteur et largeur du carré: "+window.getComputedStyle(divCard).getPropertyValue('width')+" x "+window.getComputedStyle(divCard).getPropertyValue('height');
    alert += "\n Nom de la classe du carré: "+divCard.getAttribute("id");
    alert += "\n Police et taille du texte: "+window.getComputedStyle(divCardSpan).getPropertyValue('font-family')+" "+window.getComputedStyle(divCardSpan).getPropertyValue('font-size');
    window.alert(alert);
})