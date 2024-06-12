//import math
import { create, all } from 'mathjs'
//init math
const math = create(all,  {})

// Exercice JS Hello World - Elan Formation
console.log("Exercice JS Hello World - Elan Formation");

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
function findSecretNumber(){
    const secretNumber = math.floor(math.random()*100);
    const maxAttempt = 5;
    let attemtp = maxAttempt;
    let number = 0;

    do{ //
        number = window.prompt("Pourras-tu trouver le nombre secret?\n ${attemtp} tentatives restantes!");
        attemtp -= 1;
    } while(number != secretNumber && attemtp >= 0)
    
    if(number != secretNumber) {console.log("Vous avez perdu. Le nombre secret était ${secretNumber}");}
    else {console.log("Vous avez gagné en ${maxAttempt - attemtp} tentatives!")}
}
findSecretNumber();

let tab = [11,77,58,67,42,18,11,19,63];
tab.push(1);
console.log(tab);



