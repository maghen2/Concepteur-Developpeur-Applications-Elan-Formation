
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
    //personnalisation des tâches avec de numéro et de couleurs differentes
    let colors = getRandomColor();
    const newCard = card.cloneNode(true); // clonage de la div .todoCard existante
    const newTextArea = newTask.querySelector(".task");
    newTextArea.setAttribute("style", "color: #"+colors[0]+"; border-color: #"+colors[0]+"; background-color: #"+colors[1]); // application de la personnalisation des styles
    const newDelBtn = newTask.querySelector(".delBtn"); // ajout de l'action de deleteBtn au nouveau child crées
    newDelBtn.setAttribute("style", "color: #"+colors[0]);
    newDelBtn.addEventListener("click", function(){
        deleteTask(newTask);
    });

    tasksContainer.appendChild(newTask); // on ajoute la nouvelle tache au noeud parent
    divCount.innerHTML = "<p style='color: #"+colors[0]+"; font-weight: bolder;'>"+counter+" tâches</p>";
}

//on crée la fonction getInfo qui nous retourne les infos de la div
function getInfo(divCard){
    let info = "<ul>";
    info += "<li> couleur de fond: <strong>"+window.getComputedStyle(divCard).getPropertyValue('background-color')+"</strong><li>";
    info += "<li> Hauteur et largeur du carré: <strong>"+window.getComputedStyle(divCard).getPropertyValue('width')+" x "+window.getComputedStyle(divCard).getPropertyValue('height')+"</strong><li>";
    info += "<li> Nom de la classe du carré: <strong>"+divCard.getAttribute("class")+"</strong><li>";
    info += "<li> Police et taille du texte: <strong>"+window.getComputedStyle(divCardSpan).getPropertyValue('font-family')+" "+window.getComputedStyle(divCardSpan).getPropertyValue('font-size')+"</strong><li>";
    info += "</li>";
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
    newDivCard.innerHTML = "<span>Carrée "+counter+"</span>";
    divCardContainer.appendChild(newDivCard); // on ajoute la nouvelle tache au noeud parent
    divCount.innerHTML = "<p style='color: #"+colors[0]+"; font-weight: bolder;'>"+counter+" carrées</p>";
}

const divCardContainer = document.querySelector("div#cardContainer"); // <div id="cardContainer">
const divCard = divCardContainer.querySelector("div.card"); // <div class="card">
const buttonAddCard = document.querySelector("button#addCard"); // <button id="addCard">
let counter = divCardContainer.childElementCount;

// ajout de l'action copyCard à l'évenement click sur div.card
divCard.addEventListener("click", function (){
    copyCard(card);
});

// ajout de l'action addCard(card) au bouton 
buttonAddCard.addEventListener("click", function(){
    addCard(divCard);
});
