
// On crée la fonction d’ajout addTask()
function addTask(){
    //personnalisation des tâches avec de numéro et de couleurs differentes
    let backgroundColor = Math.floor(Math.random()*0xFFFFFF);
    let color = Math.floor(backgroundColor/2);
    color.toString(16);
    backgroundColor.toString(16);

    const newTask = taskCard.cloneNode(true); // clonage de la div .todoCard existante
    const newTextArea = newTask.querySelector(".task");
    newTextArea.setAttribute("style", "color: #"+color+"; background-color: #"+backgroundColor); // application de la personnalisation des styles
    const newDelBtn = newTask.querySelector(".delBtn"); // ajout de l'action de deleteBtn au nouveau child crées
    newDelBtn.addEventListener("click", function(){
        deleteTask(newTask);
    });
    counter += 1; // on incremente le compteur de tâches
    newTextArea.value = "New task "+counter;
    tasksContainer.appendChild(newTask); // on ajoute la nouvelle tache au noeud parent
    divCount.innerHTML = "<p><b>"+counter+" tâches</b></p>";
}

// On crée la fonction de suppression deleteTask()
function deleteTask(taskCard){
    // taskCard.remove();
    tasksContainer.removeChild(taskCard);
    counter -= 1; // on desincremente le compteur de taches
    divCount.innerHTML = "<p><b>"+counter+" tâches</b></p>";
}

// On ajoute un écouteur d’évènement sur le bouton pour appeler une fonction ajout
const boutonAdd = document.querySelector("#btn"); // const boutonAdd = document.querySelector("button") on recupere le bnouton grace à son id
//myButton.addEventListener("click", function (){setUserName()});
boutonAdd.addEventListener("click", addTask); // on associe l'éxecution de la fonction addTask au clic sur le bouton #btn
const taskCard = document.querySelector(".todoCard"); // div .todoCard
const tasksContainer = document.querySelector("#todoCards"); // div #todoCards

// on ajoute l'action de la fonction deleteTask en cas de clic sur le bouton delBtn de loa carte
const delBtn = taskCard.querySelector(".delBtn");
delBtn.addEventListener("click", function(){
    deleteTask(taskCard);
});

// Ajouter une div dans l’html où l’on indiquera le nombre de cards (le compteur)
let counter = 1; // on initialise le compteur
const divCount = document.querySelector("#count"); // on selectionne la div du conteur
divCount.innerHTML = "<p><b>"+counter+" tâches</b></p>";

