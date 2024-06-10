/*
Les bases de JavaScript - Apprendre le développement web | MDN
JavaScript est un langage de programmation qui ajoute de l'interactivité à votre site web (par exemple : jeux, réponses
*/

// Changement du texte de la balise h1
let myHeading = document.querySelector("h1");
myHeading.textContent = "Bonjour, monde !";

//changement dynamique du titre de la page
let myTitle = document.querySelector("title");
myTitle.textContent = "Bonjour, monde !";

// Changement de l'image
let myPicture =  document.querySelector("img");
myPicture.addEventListener("click", function(){
    myPicture.src = "https://blog.mozilla.org/opendesign/files/2019/06/FX_Design_Blog_Logos_Family.jpg";
    //myPicture.getAttribute("src")
    myPicture.setAttribute("style", "width:100%");
});


// bouton changement d'utlisateur
let myButton = document.querySelector("button");

function setUserName(){
    // On verifie si un user est dejà stocké en local, si c'est le cas on l'affiche
    if(typeof(localStorage.getItem("name")) != 'undefined' && localStorage.getItem("name") != ""){ 
        let myStoredName = localStorage.getItem("name");
        myTitle.textContent =  myHeading.textContent = "Bonjour "+myStoredName+"!";
    } 
    // dans le cas contraire, on en crée un, le stock en local et on l'affiche
    else{
        let myName = prompt("Quel est votre prénom?");
        localStorage.setItem("name", myName);
        myTitle.textContent =  myHeading.textContent = "Bonjour "+myName+"!";
    }
}

myButton.addEventListener("click", function (){setUserName()});

