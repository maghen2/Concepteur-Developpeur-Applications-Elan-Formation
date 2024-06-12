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


