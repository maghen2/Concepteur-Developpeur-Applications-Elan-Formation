// Exercice JS Hello World - Elan Formation
console.log("Exercice JS Hello World - Elan Formation");
let i = 0;
myH1=document.querySelector("h1");
myH1.textContent = "Hello World JS";

//changement dynamique du titre de la page
let myTitle = document.querySelector("title");
myTitle.textContent = "Bonjour, monde !";

let age = 39;
const name = "Rostant";

// affiche la table de multiplication demandée

function printMultiplicationTable(){
    let nbr = window.prompt("Quel nombre dois_je afficher sa table de multiplication?",2);
    let i = 1;
    do{
        console.log(nbr+" x "+i+" = "+nbr*i);
        i++; 
    } while(i<=10)
}
printMultiplicationTable();

// ecrire une fonction qui invite l'utlisateur à deviner un nombre secret en au plsu 5 tentatives
function findSecretNumber() {
    const secretNumber = Math.floor(Math.random() * 100);
    const maxAttempt = 5;
    let attempt = maxAttempt;
    let number = 0;

    do {
        number = parseInt(window.prompt(`Pourras-tu trouver le nombre secret?\n ${attempt} tentatives restantes!`), 10);
        attempt -= 1;
        if(number === secretNumber)
            console.log(`Vous avez gagné en ${maxAttempt - attempt} tentatives!`);    
        else if (number > secretNumber)
            console.log(`${number} est trop grand`);
        else console.log(`${number} est trop petit`);
    } while (number !== secretNumber && attempt > 0);
    if(number == secretNumber)
        window.alert(`Vous avez gagné en ${maxAttempt-attempt}, le nombre secret était ${secretNumber}`);
    else 
    window.alert(`Vous avez perdu, le nombre secret était ${secretNumber}`);
}
findSecretNumber();

let tab = [11,77,58,67,42,18,11,19,63];
tab.push(1);
console.log(`|_${tab.join('_|_')}_|`);


//DOM acces et modiifcation des node du document
let week = document.getElementById("week");
week.setAttribute("style", "font-weight: bold; font-size: 15px");
week.style.fontSize = 20;
console.dir(week); 
let list = document.querySelector("ul");
let listChildrens = list.querySelectorAll("li");
listChildrens.forEach(function(element){   
(i%2==0)? color = "green" : color = "red";
element.style.color = color;
 i+=1;
});




