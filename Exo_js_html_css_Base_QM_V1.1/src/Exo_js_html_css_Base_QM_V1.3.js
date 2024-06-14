/*
Exercice 3 : Créer une page web affichant plusieurs carrés numérotés de 200 x 200 pixels chacun avec un fond de couleur différente pour chaque carré
En cliquant sur n'importe quel carré, celui-ci rétrécit de 10%, décrit une rotation de 360 degrés et prend un fond rouge. En recliquant dessus, le carré reprend ses propriétés initiales (voir animation en annexe)

En cliquant sur n'importe quel carré du haut, le carré du bas prend sa couleur et le code couleur du carré sélectionné s’affiche ainsi que les informations suivantes :

Couleur du texte et couleur de fond
Hauteur et largeur du carré
Nom de la classe du carré (class : "carre" par exemple)
Police et taille du texte

En survolant s'importe quel de ces carrée, celui ci afficge en info bulle les memes informations
*/

/* fonction d'animation de l'objet
// remplacer par divCard.classList.toggle("anim") 
function anim(divCard){
    // l'attribut personnalisé data-click nous permets de savoir si c'est le premeier ou second click
    if(divCard.getAttribute("data-click") == 0){
       
        divCard.style.transform = "rotate(360deg)";
        divCard.style.zoom = "90%";
        divCard.style.background = "red";
        divCard.style.transition = "all 2s";
        divCard.setAttribute("data-click", 1);

        ;
    }
    else {

        divCard.setAttribute("data-click", 0);
    }
}
    */
function getRandomColor() {
    let letters = '0123456789ABCDEF';
    let color, backgroundColor;
    color = backgroundColor = '';
    for (var i = 0; i < 6; i++) {
        rgb = Math.floor(Math.random() * 16);
        backgroundColor += letters[rgb];
        color += letters[Math.floor(rgb/2)];
    }
    return [color, backgroundColor];
}

// On crée la fonction copyCard(card) qui va lire la card sur laquelle l'utilisateur a copié pour la coller dans la cadr du dessous
function copyCard(divCard){
    // on recupère les valeurs de color et background-color de la div passé en param pour l'appliquer à la div screen
    const color =  window.getComputedStyle(divCard).getPropertyValue('color');
    const backgroundColor = window.getComputedStyle(divCard).getPropertyValue('background-color');
    divScreen.setAttribute("style", `color: ${color}; border-color: ${color}; background-color: ${backgroundColor}; line-height: 1em; padding: 1em;`);
    // On remplca le texte de la div screen par les infos de la div passée en param
    divScreen.innerHTML = getInfo(divCard);
   
}

//on crée la fonction getInfo qui nous retourne les infos de la div
function getInfo(divCard){
    let info = "<ul>";
    info += "<li> couleur de fond: <strong>"+window.getComputedStyle(divCard).getPropertyValue('background-color')+"</strong></li>";
    info += "<li> Hauteur et largeur du carré: <strong>"+window.getComputedStyle(divCard).getPropertyValue('width')+" x "+window.getComputedStyle(divCard).getPropertyValue('height')+"</strong></li>";
    info += "<li> Nom de la classe du carré: <strong>"+divCard.getAttribute("class")+"</strong></li>";
    info += "<li> Police et taille du texte: <strong>"+window.getComputedStyle(divCard).getPropertyValue('font-family')+" "+window.getComputedStyle(divCard).getPropertyValue('font-size')+"</strong></li>";
    info += "</ul>";
    return info;
}

// Affichage des informations au survul de l'élement avec la souris
function tooltip(divCard){
    let info = getInfo(divCard); // on recupère les informations
        // on supprime les elements HTML du texte
        div.innerHTML = info;
        info = div.textContent;
    divCard.setAttribute("title", info);
}

// On crée la fonction createCard qui créer de nouvelles card à la volet
function addCard(divCard){
    //personnalisation des tâches avec de numéro et de couleurs differentes
    let colors = getRandomColor();
    // clonage de la div existante passée en paramètre
    const newDivCard = divCard.cloneNode(true); 
    // application de la personnalisation des styles
    newDivCard.setAttribute("style", "color: #"+colors[0]+"; border-color: #"+colors[0]+"; background-color: #"+colors[1]); 
    tooltip(newDivCard); // ajout de l'action copyCard(newDivCard) à l'évenement click
    newDivCard.addEventListener("click", function(){
        copyCard(newDivCard); // Affichage des informations au survul de l'élement avec la souris
        newDivCard.classList.toggle("anim"); // ajout de l'action anim à l'évenement click sur newDivCard
    });
    counter += 1; // on incremente le compteur de carrée
    newDivCard.innerHTML = "<span style='color: #"+colors[0]+"'>Carrée "+counter+"</span>";
    divCardContainer.appendChild(newDivCard); // on ajoute la nouvelle tache au noeud parent
    div.innerHTML = "<p style='color: #"+colors[0]+"; font-weight: bolder;'>"+counter+" carrées</p>";
    h2Solution.after(div); 
}

const divCardContainer = document.querySelector("div#cardContainer"); // <div id="cardContainer">
const divCard = divCardContainer.querySelector("div.card"); // <div class="card">
const buttonAddCard = document.querySelector("button#addCard"); // <button id="addCard">
let counter = divCardContainer.childElementCount; // on compte le nombre d'enfants de la div
const divScreen = document.querySelector("div#screen"); // <div class="card" id="screen" >
const h2Solution = document.querySelector("h2#solution"); // <h2 id="solution">Solution</h2>
const div = document.createElement("div");
// ajout de l'action copyCard à l'évenement click sur div.card
divCard.addEventListener("click", function (){
    copyCard(divCard);
    divCard.classList.toggle("anim");
});

// ajout de l'action addCard(card) au bouton 
buttonAddCard.addEventListener("click", function(){
    addCard(divCard);
});
