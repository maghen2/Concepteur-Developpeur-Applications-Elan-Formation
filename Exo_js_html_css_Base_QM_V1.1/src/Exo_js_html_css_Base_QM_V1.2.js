
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
   // divScreen.firstElementChild.setAttribute("style", "color: "+color+"; background-color: "+backgroundColor+"; line-height: 1em; padding: 1em;");
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

// On crée la fonction createCard qui créer de nouvelles card à la volet
function addCard(divCard){
    //personnalisation des tâches avec de numéro et de couleurs differentes
    let colors = getRandomColor();
    // clonage de la div existante passée en paramètre
    const newDivCard = divCard.cloneNode(true); 
    // application de la personnalisation des styles
    newDivCard.setAttribute("style", "color: #"+colors[0]+"; border-color: #"+colors[0]+"; background-color: #"+colors[1]); 
    // ajout de l'action copyCard(newDivCard) à l'évenement click
    newDivCard.addEventListener("click", function(){
        copyCard(newDivCard);
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
});

// ajout de l'action addCard(card) au bouton 
buttonAddCard.addEventListener("click", function(){
    addCard(divCard);
});
