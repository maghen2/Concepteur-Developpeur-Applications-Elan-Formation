
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
function copyCard(card)(){
    //personnalisation des tâches avec de numéro et de couleurs differentes
    let colors = getRandomColor();
    const newCard = taskCard.cloneNode(true); // clonage de la div .todoCard existante
    const newTextArea = newTask.querySelector(".task");
    newTextArea.setAttribute("style", "color: #"+colors[0]+"; border-color: #"+colors[0]+"; background-color: #"+colors[1]); // application de la personnalisation des styles
    const newDelBtn = newTask.querySelector(".delBtn"); // ajout de l'action de deleteBtn au nouveau child crées
    newDelBtn.setAttribute("style", "color: #"+colors[0]);
    newDelBtn.addEventListener("click", function(){
        deleteTask(newTask);
    });
    counter += 1; // on incremente le compteur de tâches
    newTextArea.value = "New task "+counter;
    tasksContainer.appendChild(newTask); // on ajoute la nouvelle tache au noeud parent
    divCount.innerHTML = "<p style='color: #"+colors[0]+"; font-weight: bolder;'>"+counter+" tâches</p>";
}

// On crée la fonction createCard qui créer de nouvelles card à la volet
function addCard(card)(){
    //personnalisation des tâches avec de numéro et de couleurs differentes
    let colors = getRandomColor();
    const newCard = taskCard.cloneNode(true); // clonage de la div .todoCard existante
    const newTextArea = newTask.querySelector(".task");
    newTextArea.setAttribute("style", "color: #"+colors[0]+"; border-color: #"+colors[0]+"; background-color: #"+colors[1]); // application de la personnalisation des styles
    const newDelBtn = newTask.querySelector(".delBtn"); // ajout de l'action de deleteBtn au nouveau child crées
    newDelBtn.setAttribute("style", "color: #"+colors[0]);
    newDelBtn.addEventListener("click", function(){
        deleteTask(newTask);
    });
    counter += 1; // on incremente le compteur de tâches
    newTextArea.value = "New task "+counter;
    tasksContainer.appendChild(newTask); // on ajoute la nouvelle tache au noeud parent
    divCount.innerHTML = "<p style='color: #"+colors[0]+"; font-weight: bolder;'>"+counter+" tâches</p>";
}

const cardContainer = document.querySelector("div#cardContainer"); // <div id="cardContainer">
const card = cardContainer.querySelector("div.card"); // <div class="card">

// ajout de l'action copyCard à l'évenement click sur div.card
card.addEventListener("click", function (){
    copyCard(card);
});


